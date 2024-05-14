<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['name', 'status'];

    public function participants()
    {
        return $this->hasMany(ConversationParticipant::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the other participant of the conversation who is not the currently authenticated user.
     */
    public function otherParticipant()
    {
        return $this->participants()->where('user_id', '!=', auth()->id())->first();
    }
}
