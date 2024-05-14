<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Conversation;
use App\Models\User; // Importa el modelo User
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Conversation $conversation)
    {
        // Recuperar y mostrar todos los mensajes de una conversación específica
        $messages = $conversation->messages()->orderBy('created_at')->get();
        return view('messages.index', compact('conversation', 'messages'));
    }
    public function create($otherUserId)
    {
        $user = auth()->user();
        $otherUser = User::findOrFail($otherUserId);

        // Buscar una conversación existente o crear una nueva
        $conversation = Conversation::whereHas('participants', function ($query) use ($user, $otherUser) {
            $query->where('user_id', $user->id)
                ->orWhere('user_id', $otherUser->id);
        })->first();

        if (!$conversation) {
            $conversation = new Conversation();
            $conversation->save();

            $conversation->participants()->create(['user_id' => $user->id]);
            $conversation->participants()->create(['user_id' => $otherUser->id]);
        }

        return redirect()->route('conversations.show', $conversation->id);
    }


    public function store(Request $request, Conversation $conversation)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->content = $request->input('content');
        $message->conversation_id = $conversation->id;
        $message->user_id = auth()->id(); // Asignar el ID del usuario autenticado
        $message->save();

        return redirect()->route('conversations.show', $conversation->id)->with('success', 'Mensaje enviado correctamente.');
    }
}
