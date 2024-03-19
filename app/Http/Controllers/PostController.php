<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $post = Post::paginate(10); 
        $trending = Post::latest()->limit(6)->get();
        return view('welcome', compact('post', 'trending'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = $post->user;
        $comment = $post->comment;
        $commentCount = $comment->count();

        $blog = Post::where('usersid', $user->id)
                        ->where('id', '!=', $post->id) 
                        ->latest()
                        ->limit(3)
                        ->get();

        return view('post.index', compact('post', 'blog', 'comment', 'commentCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);
        
        $post = Post::create([
            'usersid' => Auth::user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
            'category' => $request->category,
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/image', $imageName); 
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('profile.show')->with('success', 'your post was sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post.edit', compact('post'));
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
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category = $request->category;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/image', $imageName); 
            $post->image = $imageName;
        }
    
        $post->save();
    
        return redirect()->route('profile.show')->with('success', 'Your post was updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id', $id)->delete();
        return redirect()->route('profile.show')->with('success', 'post deleted');
    }
}
