<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class SimpleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
                $posts=Post::orderBy("created_at","desc")->with("user")->paginate(15);
        return view('dashboard',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          return view("create_new_post");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

                    $request->validate([
                    'title' => ['required', 'max:255'],
                    'content' => 'required',
                ]);

                // echo $request->post();
                Post::create([
                    "title"=>$request->title,
                    "content"=>$request->content,
                    "user_id"=>Auth::id()
            ]);
                return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}