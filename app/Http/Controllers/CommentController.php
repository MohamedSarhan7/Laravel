<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserM;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comments = Comment::orderBy("created_at", "desc")->paginate(5);
        // $posts = Post::with('author')->orderBy("created_at", "desc")->paginate(5);
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $authors = UserM::all();
        $posts = Post::all();


        return view("comment.create", compact('authors', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'user_id' => 'required',
            'post_id' => "required",
            'body' => ['required', 'max:255'],
        ]);

        // echo $request->post();
        Comment::create($request->except('_token'));


        return redirect()->route("comment.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
        return view('comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
        $authors = UserM::all();
        $posts = Post::all();

        return view('comment.edit', compact('comment','posts', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $request->validate([
            'body' => ['required', 'max:255'],
            'user_id' => "required",
            'post_id' => 'required',
        ]);
        Comment::find($comment->id)->update($request->except(['_token', '_method']));

        // echo $request->post();
        return redirect()->route('comment.show', $comment->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        Comment::find($id)->delete();
        
        return redirect()->route('comment.index');
    }
}
