<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Image;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->latest()->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(UserCreateRequest $request)
    {
       $input = $request->all();
       
       if ($file = $request->file('image_id')) {
           $nameFile = time() . $file->getClientOriginalName();

            $image = Image::create(['file' => $nameFile]);

            $input['image_id'] = $image->id;
        }
        
        $input['password'] = Hash::make($input['password']);

        User::create($input);

    }

    public function show($id)
    {
        return view('admin.users.show');
    }

    public function edit($id)
    {
        return view('admin.users.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
