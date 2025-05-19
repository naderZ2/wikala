<?php

namespace App\Repositories;

use App\Models\Follower;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Auth;

class FollowRepository
{
    use ResponsesTrait;
    public function follow($userId)
    {
        $existingFollow = Follower::where('user_id', $userId)
            ->where('follower_id', Auth::id())
            ->first();

        if ($existingFollow) {
            return $this->failed(null, __('already_following'));
        }

        $newFollow = Follower::create([
            'user_id' => $userId,
            'follower_id' => Auth::id(),
        ]);

        return $this->success($newFollow, __('follow_success'));
    }

    public function unfollow($userId)
    {
        $existingFollow = Follower::where('user_id', $userId)
            ->where('follower_id', Auth::id())
            ->first();

        if (!$existingFollow) {
            return $this->failed(null, __('not_following'));
        }

        $existingFollow->delete();

        return $this->success(null, __('unfollow_success'));
    }

    public function getFollowers($userId)
    {
        return Follower::where('user_id', $userId)->get();
    }

    public function getFollowing($userId)
    {
        return Follower::where('follower_id', $userId)->get();
    }
}