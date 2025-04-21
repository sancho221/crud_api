<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $categories = User::all();
        return view('user.create', compact('categories'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        if ($request->password) $data['password'] = $request->password;
        User::create($data);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, UserRequest $request)
    {
        $data = $request->validated();
        if ($request->password) $data['password'] = $request->password;
        $user->update($data);
        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete($user);
        return redirect()->route('users.index');
    }
}
