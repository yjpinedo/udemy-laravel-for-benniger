<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','image', 'category')
                     ->latest()
                     ->paginate(10);
        return view('admin.posts.index', ['posts' => $posts]);
    }
     
    public function create()
    {
        $categories = Category::get();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(PostRequest $request)
    {
        $input = $request->all();

        if ($file = $request->file('image_id')) {
            $nameFile = time() . $file->getClientOriginalName();
 
            $file->move('img', $nameFile);
 
             $image = Image::create(['file' => $nameFile]);
 
             $input['image_id'] = $image->id;
        } else {
             $input = Arr::except($input,['image_id']);
        }

        $input['user_id'] = auth()->id();

        Post::create($input);

        return redirect()->route('posts.index')->with('status', 'Post creado con exito');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
