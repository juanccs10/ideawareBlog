<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $data['posts'] = Post::with('users')->get();
        return view('post.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $users = User::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('post.create', compact('users', 'tags'));
    }

    public function createByUser(Request $request)
    {
        $tags = Tag::pluck('name', 'id');
        return view('post.createByUser', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'user_id' => ['required']
        ]);

        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => $request['user_id']
        ]);

        if (is_array($request->tags)) {
            $post->tags()->attach($request->tags);
        }
        return redirect('posts');
    }

    public function storeByUser(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => $request->user()->id
        ]);

        if (is_array($request->tags)) {
            $post->tags()->attach($request->tags);
        }

        return redirect('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.show', ['post' => Post::with('tags')->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);

        $where = array('id' => $id);
        $post_info = Post::where($where)->first();
        $selectedID = $post_info->user_id;

        $users = User::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        $assignedTags  = $post_info->tags->pluck('id')->toArray();
        return view('post.edit', compact('users','tags','post_info', 'selectedID', 'assignedTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);

        $request->validate([
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

        $post->tags()->sync($request->tags);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);

        Post::where('id', $id)->delete();
        return redirect('posts');
    }
}
