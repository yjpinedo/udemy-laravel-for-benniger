<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Image;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role', 'image')->latest()->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(UserCreateRequest $request)
    {
        $request->validate([
            'name'    => 'required|string|unique:users,name,',
            'email'   => 'required|string|email|unique:users,email,',
        ]);

       $input = $request->all();
       
       if ($file = $request->file('image_id')) {
           $nameFile = time() . $file->getClientOriginalName();

           $file->move('img', $nameFile);

            $image = Image::create(['file' => $nameFile]);

            $input['image_id'] = $image->id;
        }
        
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        return redirect()->route('users.index')->with('status', 'Usuario guardado con éxito');

    }

    public function show($id)
    {
        return view('admin.users.show');
    }

    public function edit($id)
    {
        $roles = Role::get();
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(UserUpdateRequest $request, $id)
    {

        $request->validate([
            'name'    => 'required|string|unique:users,name,'.$id,
            'email'   => 'required|string|email|unique:users,email,'.$id,
        ]);

       $user = User::findOrFail($id);    

       $input = $request->all();
       
       if ($file = $request->file('image_id')) {
           $nameFile = time() . $file->getClientOriginalName();

           $file->move('img', $nameFile);

            $image = Image::create(['file' => $nameFile]);

            $input['image_id'] = $image->id;
        } else {
            $input = Arr::except($input,['image_id']);
        }
        
        if(!empty(trim($input['password']))){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,['password']);
        }

        $user->update($input);

        return redirect()->route('users.index')->with('status', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (isset($user->image->file)) {
            unlink(public_path() . '/' . $user->image->file);
        }

        $user->delete();

        return redirect()->route('users.index')->with('status', 'Usuario eliminado con éxito');
    }
}
