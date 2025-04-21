<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class ItemController extends Controller
{
    public function index(ItemRequest $request)
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
            return ItemResource::collection($item);
        } catch (\Throwable $th) {
            return response()->json([
                'error_code' => $th->getCode(),
                'error_message' => $th->getMessage(),
            ]);
        }
    }

    public function show($item)
    {
        try {
            $result = Item::find($item);
            if (!$result) throw new Exception('Такой id товара не существует');
            return new ItemResource($result);
        } catch (\Throwable $th) {
            return response()->json([
                'error_code' => $th->getCode(),
                'error_message' => $th->getMessage(),
            ]);
        }
    }
}
