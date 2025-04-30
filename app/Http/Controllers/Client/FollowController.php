<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Services\FollowService;
use Illuminate\Support\Facades\Log;
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

        $existingFollow = Follower::where('user_id', $userId)
        ->where('follower_id', Auth::id())
        ->first();

        if ($existingFollow) {
            return $this->failed(null, __('already_following'));
        }

        $authUserId = Auth::id();
        Log::info('User ID: ' . $userId);
        Log::info('Auth User ID: ' . $authUserId);
        
        return $this->followService->followUser($userId, $authUserId);
    }
    
    // Unfollow a user
    public function unfollow($userId)
    {
        
        
        
        
        return $this->followService->unfollowUser($userId);
    }


    public function followers($userId)
    {
        $authUserId = Auth::id();
        return $this->followService->getFollowers($userId, $authUserId);
    }

    
    public function following($userId)
    {
        $authUserId = Auth::id();
        return $this->followService->getFollowing($userId, $authUserId);
    }

    
}
