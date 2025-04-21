<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('item.create', compact('categories'));
    }

    public function store(ItemRequest $request)
    {
        $data = $request->validated();
        Item::create($data);
        return redirect()->route('items.index');
    }

    public function show(Item $item)
    {
        $category = Category::find($item->category_id);
        return view('item.show', compact('item', 'category'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('item.edit', compact('item', 'categories'));
    }

    public function update(Item $item, ItemRequest $request)
    {
        $data = $request->validated();
        $item->update($data);
        return redirect()->route('items.show', $item->id);
    }

    public function destroy(Item $item)
    {
        $item->delete($item);
        return redirect()->route('items.index');
    }
}
