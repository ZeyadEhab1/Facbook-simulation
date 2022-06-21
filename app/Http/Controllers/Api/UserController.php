<?php

namespace App\Http\Controllers\Api;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function index()
    {
        $users = User::get()->all();

        return $this->helper->responseJson(1, 'entry done', UserResource::collection($users));
    }

    public function getUserPosts($id)
    {
        $user = User::findorfail($id);
        $posts = $user->posts()->get()->all();

        return $this->helper->responseJson(1, 'entry done', PostResource::collection($posts));

    }

    public function getPostComments($id)
    {
        $post = Post::findorfail($id);
        $comments = $post->comments()->paginate();

        return $this->helper->responseJson(1, 'entry done',  CommentResource::collection($comments));

    }
}
