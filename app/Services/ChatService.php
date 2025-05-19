<?php


namespace App\Services;

use App\Repositories\ChatRepository;

class ChatService
{
    protected $chatRepo;

    public function __construct(ChatRepository $chatRepo)
    {
        $this->chatRepo = $chatRepo;
    }

    public function getUserMessages($userId)
    {
        return $this->chatRepo->getAllMessagesForUser($userId);
    }

    public function sendMessage(array $data)
    {
        
        return $this->chatRepo->sendMessage($data);
    }
}
