<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;

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
        User::create($request->all());
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
