<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(ItemRequest $request)
    {
        try {
            $data = $request->validated();

            $query = Item::query();
            if (isset($data['name'])) {
                $name = str_replace(["'", '"'], "", $data['name']);
                $query->where('name', 'like', "%{$name}%");
            }
            $item = $query->get();
            if (count($item) === 0) throw new Exception('Такое имя товара не существует');
            $categories = [];
            foreach ($item as $id) {
                $categories[] = $id->category_id;
            }
            $category = Category::find($categories);
            return CategoryResource::collection($category);
        } catch (\Throwable $th) {
            return response()->json([
                'error_code' => $th->getCode(),
                'error_message' => $th->getMessage(),
            ]);
        }
    }
}
