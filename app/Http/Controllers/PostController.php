<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::paginate(10);
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        $this->authorize('view-post',$post);
        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required|min:4',
           'title'=>'required|min:4'
        ]);
        $post=Post::create($request->all());
        return new PostResource($post);
    }

    public function update($id,Request$request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'title'=>'required|min:4'
        ]);
        $post=Post::find($id);
        $post->update($request);
        return new PostResource($post);
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return new PostResource($post);
    }

    public function search($data)
    {
        $post=Post::where('name','like',"%$data%")->orWhere('title','like',"%$data%")->get();
        return response()->json($post);
    }
}
