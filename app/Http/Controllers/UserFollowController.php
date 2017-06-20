<?php

namespace App\Http\Controllers;

use App\Repositories\UserFollowRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFollowController extends Controller
{
    protected $userRepository;

    public function __construct(UserFollowRepository $userFollowRepository)
    {
        $this->userRepository = $userFollowRepository;
    }

    /**
     * 判断被查看的用户是否已经被已登录的用户关注
     *
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($user_id)
    {
        $user = user('api');

        $followed = $user->followedUser($user_id);

        if ($followed) {
            return response()->json(['followed' => true]);
        }

        return response()->json(['followed' => false]);
    }

    /**
     * 用户之间的互相关注
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow(Request $request)
    {
        // 当前登录的用户
        $follower_user = user('api');

        // 被关注的用户
        $followed_user = $this->userRepository->byId($request->get('user_id'));

        return $this->userRepository->followThisUser($follower_user, $followed_user);

    }
}
