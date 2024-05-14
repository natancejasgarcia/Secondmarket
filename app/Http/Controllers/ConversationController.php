<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        // Asegúrate de cargar también los participantes y mensajes si es necesario
        $conversations = Conversation::with(['participants', 'messages'])
            ->whereHas('participants', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();

        return view('conversations.index', compact('conversations'));
    }
    public function show(Conversation $conversation)
    {
        // Aquí puedes mostrar los mensajes de una conversación específica
        $messages = $conversation->messages()->orderBy('created_at', 'desc')->get();
        return view('conversations.show', compact('conversation', 'messages'));
    }


    public function store(Request $request)
    {
        // Aquí puedes crear una nueva conversación
    }
}
