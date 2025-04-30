<?php

namespace App\Services;

use App\Repositories\FollowRepository;

class FollowService
{
    protected $followRepository;

    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
    }

    public function followUser($userId)
    {
        return $this->followRepository->follow($userId);
    }

    public function unfollowUser($userId)
    {
        return $this->followRepository->unfollow($userId);
    }

    public function getFollowers($userId)
    {
        return $this->followRepository->getFollowers($userId);
    }

    public function getFollowing($userId)
    {
        return $this->followRepository->getFollowing($userId);
    }
}