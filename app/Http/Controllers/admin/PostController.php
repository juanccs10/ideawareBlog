<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\BaseController as BaseController;
use App\Post;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Validator;

class PostController extends BaseController
{
    public function getPosts(Request $request){
        $success['posts'] = Post::with('users')->get();
        return $this->sendResponse($success, 'Posts-Successfully Returned');
    }

    public function getPost(Request $request, $id){
        $success['post'] = Post::where('id',$id)->first();
        return $this->sendResponse($success, 'Post-Successfully Returned');
    }

    public function putPost(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'user_id' => ['required']
        ]);

        $update = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id
        ];

        $post = Post::where('id', $id)->first();
        $post->update($update);

        $success['post'] = Post::where('id',$id)->first();
        return $this->sendResponse($success, 'Successfully updated post');
    }

    public function postPosts(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'user_id' => ['required']
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => $request['user_id']
        ]);

        $success['post_id'] = $post->id;

        return $this->sendResponse($success, 'Post register successfully.');

    }

    public function deletePost(Request $request, $id){
        Post::where('id', $id)->delete();
        $success['post_id'] = $id;
        return $this->sendResponse($success, 'Post successfully deleted');
    }
}
