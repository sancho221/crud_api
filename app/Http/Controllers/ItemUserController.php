<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUserRequest;
use App\Models\Category;
use App\Models\CategoryUser;
use App\Models\User;
use Illuminate\Http\Request;

class ItemUserController extends Controller
{
    public function index()
    {
        $category_users = CategoryUser::all();
        return view('category_user.index', compact('category_users'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('category_user.create', compact('categories', 'users'));
    }

    public function store(CategoryUserRequest $request)
    {
        $data = $request->validated();
        CategoryUser::create($data);
        return redirect()->route('category_users.index');
    }

    public function show(CategoryUser $category_user)
    {
        $cu = CategoryUser::find($category_user->id);
        return view('category_user.show', compact('cu'));
    }

    public function edit(CategoryUser $category_user)
    {
        $categories = Category::all();
        $users = User::all();
        return view('category_user.edit', compact('category_user', 'categories', 'users'));
    }

    public function update(CategoryUser $category_user, CategoryUserRequest $request)
    {
        $data = $request->validated();
        $category_user->update($data);
        return redirect()->route('category_users.show', $category_user->id);
    }

    public function destroy(CategoryUser $category_user)
    {
        $category_user->delete($category_user);
        return redirect()->route('category_users.index');
    }
}
