<?php

namespace App\Events;

use App\Models\Chat;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function broadcastOn()
    {
        // Log::info('Message sent event fired');

        return new PrivateChannel('chat.' . $this->chat->receiver_id);
    }

    public function broadcastWith()
    {
        // Log::info('Message sent event fired2');

        return [
            'id' => $this->chat->id,
            'message' => $this->chat->message,
            'message_type' => $this->chat->message_type,
            'sender_id' => $this->chat->sender_id,
            'receiver_id' => $this->chat->receiver_id,
            'created_at' => $this->chat->created_at->toDateTimeString(),
        ];
    }
}
