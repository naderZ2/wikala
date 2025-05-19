<?php

namespace App\Repositories;




use App\Models\Chat;
use Illuminate\Support\Facades\Log;

class ChatRepository
{
    public function getAllMessagesForUser($userId)
    {
        
        $chats = Chat::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender:id,name,image', 'receiver:id,name,image'])
            ->orderBy('created_at', 'asc')
            ->get();
    
        
        $conversations = [];
    
        foreach ($chats as $chat) {
            
            $otherUserId = $chat->sender_id === $userId ? $chat->receiver_id : $chat->sender_id;
    
            if (!isset($conversations[$otherUserId])) {
                $conversations[$otherUserId] = [
                    'sender' => $chat->sender_id === $userId ? $chat->sender : $chat->receiver,
                    'receiver' => $chat->sender_id === $userId ? $chat->receiver : $chat->sender,
                    'messages' => [],
                ];
            }
    
            $conversations[$otherUserId]['messages'][] = $chat;
        }
    
        
        return array_values($conversations);
    }
    


    public function sendMessage(array $data)
    {
        return Chat::create($data);
    }
}
