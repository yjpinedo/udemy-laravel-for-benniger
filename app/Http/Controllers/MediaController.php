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
}
