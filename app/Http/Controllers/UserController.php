<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {

        $users = User::all();
        return view('users.index', compact('users'));
    }

    function create()
    {
        if(!Gate::allows('create-user'))
        {
            abort(403);
        }
        $roles = Role::all();
        return view('users.add', compact('roles'));
    }

    function store(StoreUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->attach($request->roles);

        return redirect()->route('user.index');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');

    }

    function update($id)
    {
        $user = User::find($id);
        return view('users.update', compact('user'));
    }

    function edit($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.index');
    }

    function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $keyword = $request->keyword;
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->orwhere('email', 'LIKE', '%' . $keyword . '%')->get();
        return response()->json($users);
    }


}
