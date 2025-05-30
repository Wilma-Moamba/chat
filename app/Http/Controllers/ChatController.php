<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MensagemEnviada;
// use App\Http\Middleware\UpdateLastSeen;


// #[Middleware([UpdateLastSeen::class])]
class ChatController extends Controller
{

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $groups = Group::whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('telaPrincipal', compact('users', 'groups'));
    }

     public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'nullable|exists:users,id',
            'group_id' => 'nullable|exists:groups,id',
            'body' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'] ?? null,
            'group_id' => $validated['group_id'] ?? null,
            'body' => $validated['body'],
        ]);

        broadcast(new MensagemEnviada($message))->toOthers();

        return response()->json(['status' => 'Mensagem enviada com sucesso']);
    }

    public function getMessages($type, $id)
    {
        if ($type === 'user') {
            $messages = Message::where(function ($query) use ($id) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $id);
            })->orWhere(function ($query) use ($id) {
                $query->where('sender_id', $id)->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();
        } else {
            $messages = Message::where('group_id', $id)->orderBy('created_at')->get();
        }

        return response()->json($messages);
    }

    public function getGroupUsers($id)
    {
        $grupo = Group::with('users')->find($id); // Ajuste conforme o nome da relação
        if (!$grupo) {
            return response()->json([], 404);
        }

        return response()->json(
            $grupo->users->map(fn($u) => ['id' => $u->id, 'name' => $u->name])
        );
    }

    

}

