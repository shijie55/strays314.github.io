<?php
namespace App\Repositories;

use App\Notifications\NewUserFollowNotification;
use App\User;

class UserFollowRepository
{

    public function byId($user_id)
    {
        return User::find($user_id);
    }

    public function followThisUser(User $follower_user, User $followed_user)
    {
        $followed = $follower_user->followThisUser($followed_user->id);

        if (count($followed['detached']) > 0) {

            $follower_user->decrement('followers_count');
            $followed_user->decrement('followed_count');
            return response()->json(['followed' => false]);

        } else {
            // 发送提醒
            $followed_user->notify(new NewUserFollowNotification());

            $follower_user->increment('followers_count');
            $followed_user->increment('followed_count');
            return response()->json(['followed' => true]);

        }
    }
}