<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    use ResponsesTrait ;


    protected $followService;

    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }

    // Follow a user
    public function follow($userId)
    {
        return $this->followService->followUser($userId);
    }

    // Unfollow a user
    public function unfollow($userId)
    {
        return $this->followService->unfollowUser($userId);
    }

    // Get followers of a user
    public function followers($userId)
    {
        return $this->followService->getFollowers($userId);
    }

    // Get users the user is following
    public function following($userId)
    {
        return $this->followService->getFollowing($userId);
    }

    
}
