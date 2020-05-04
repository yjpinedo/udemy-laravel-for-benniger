<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
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

        return redirect()->route('posts.index')
                         ->with('status', 'Post creado con exito');
    }

    public function edit($id)
    {
       $categories = Category::get();
       $post = Post::findOrFail($id);
       return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('image_id')) {
            $nameFile = time() . $file->getClientOriginalName();

            $file->move('img', $nameFile);

            $image = Image::create(['file' => $nameFile]);

            $input['image_id'] = $image->id;
        } else {
            $input = Arr::except($input,['image_id']);
        }

        $post->update($input);

        return redirect()->route('posts.index')
                         ->with('status', 'Post actualizado con exito');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (isset($post->image->file)) {
            unlink(public_path() . '/' . $post->image->file);
        }

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('status', 'Post eliminado con éxito');
    }
}
