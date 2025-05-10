<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $groups = Auth::user()->groups;
        return view('telaPrincipal', compact('users', 'groups'));
    }

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'message' => 'required',
            'receiver_id' => 'nullable|exists:users,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $data['receiver_id'] ?? null,
            'group_id' => $data['group_id'] ?? null,
            'body' => $data['message'],
        ]);

        broadcast(new \App\Events\NewMessage($message))->toOthers();

        return response()->json($message);
    }

    public function getMessages(Request $request)
    {
        $receiver_id = $request->receiver_id;
        $group_id = $request->group_id;

        if ($receiver_id) {
            $messages = Message::where(function ($q) use ($receiver_id) {
                $q->where('sender_id', Auth::id())->where('receiver_id', $receiver_id);
            })->orWhere(function ($q) use ($receiver_id) {
                $q->where('sender_id', $receiver_id)->where('receiver_id', Auth::id());
            })->get();
        } else if ($group_id) {
            $messages = Message::where('group_id', $group_id)->get();
        } else {
            $messages = [];
        }

        return response()->json($messages);
    }
}

