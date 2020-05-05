<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $images = Image::latest()->paginate(6);
        return view('admin.media.index', ['images' => $images]);
    }
    public function create()
    {
        return view('admin.media.create');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $nameFile = time() . $file->getClientOriginalName();
        $file->move('img', $nameFile);
        Image::create(['file' => $nameFile]);
        return redirect()->route('medias.index');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id)->delete();
        unlink(public_path() . '/' . $image->file);
        return back();
    }
}
