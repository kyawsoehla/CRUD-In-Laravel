<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Auth;
use File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('created_at', 'DESC')->paginate(2);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'image'=>'required|mimes:jpg,jpeg,png,webp|max:5000',
            'category'=>'required|string',
            'description'=>'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $title=$request->title;
            $category_id=$request->category;
            $description=$request->description;
            $name=time().'.'.$image->getClientOriginalExtension();
            $path=public_path('/storage/uploads/');
            $image->move($path, $name);
            
            

            $post=new Post;
            $post->title=$title;
            $post->image=$name;
            $post->category_id=$category_id;
            $post->description=$description;
            $post->user_id=Auth::user()->id;

            if ($post->save()) {
                return redirect('/posts')->with('success', 'Records inserted successfully!');
            }
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $post=Post::findOrFail($id);
        return view('post.edit', compact('categories', 'post'));
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
            'title'=>'required|string',
            'image'=>'nullable|mimes:jpg,jpeg,png,webp|max:5000',
            'category'=>'required|string',
            'description'=>'required|string',
        ]);
        $post=Post::findOrFail($id);
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $name=time().'.'.$image->getClientOriginalExtension();
            $path=public_path('/storage/uploads/');
            $image->move($path, $name);
            

            if (isset($post->image)) {
                $oldname=$post->image;
                File::delete($path.''.$oldname);

            }
            $post->image=$name;
        }

        $title=$request->title;
        $category_id=$request->category;
        $description=$request->description;

        
        $post->title=$title;
        $post->category_id=$category_id;
        $post->description=$description;
        $post->user_id=Auth::user()->id;

        if ($post->save()) {
            return redirect('/posts')->with('success', 'Records updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post=Post::findOrFail($id);

        if ($post->delete()) {

             $path=public_path('/storage/uploads/');

            if (isset($post->image)) {
                $name=$post->image;
                File::delete($path.''.$name);

            }


            return redirect()->with('success', 'Records deleted successfully!')();
        }
    }
}
