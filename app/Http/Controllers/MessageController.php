<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string',
            'receiver_id' => 'nullable|exists:users,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $validated['sender_id'] = Auth::id();

        $message = Message::create($validated);

        return response()->json($message);
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        $unicast = Message::where(function ($q) use ($user) {
            $q->where('sender_id', $user->id)->orWhere('receiver_id', $user->id);
        })->whereNull('group_id');

        $multicast = Message::whereNoNull('group_id')
            -> whereHas('group.users', fn($q) => $q->where('receiver_id', $user->id));

        $messages = $unicast->union($multicast)->latest()->get();

        return response()->json($messages);
    }
}
