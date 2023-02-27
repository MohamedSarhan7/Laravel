<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserM;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    //
    function index()
    {
        // $posts = Post::orderBy("created_at", "desc")->paginate(5)->with(['author',"author_id"]);
        $posts = Post::with('author')->orderBy("created_at", "desc")->paginate(5);
        return view('post.index', compact('posts'));
    }



    public function create()
    {
        $authors = UserM::all();
        // dd($authors);

        return view('post.create', compact('authors'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'author_id' => "required",
            'content' => 'required',
        ]);

        // echo $request->post();
        Post::create($request->except('_token'));


        return redirect('/posts');
    }


    public function edit(Post $post)
    {
        $authors = UserM::all();

        return view('post.edit', compact('post','authors'));

    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'author_id' => "required",
            'content' => 'required',
        ]);
        Post::find($post->id)->update($request->except(['_token','_method']));

        // echo $request->post();
        return redirect()->route('post.show',$post->id);
    }


    public function show(Post $post)
    {
        // $post = Post::w;
        // dd($post);
        return view('post.show', ['post' => $post]);
    }



    public function destroy($id){
        Post::find($id)->delete();
        // dd($post);
        // $post->delete();
        return redirect()->route('post.index');
    }
}
