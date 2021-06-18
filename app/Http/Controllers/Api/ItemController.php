<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Item;
use Illuminate\Http\Request; // needed?

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::get());
    }

    public function store(Request $request)
    {
        Item::create([
            'name'          => $request->input('name'),
            'category_id'   => $request->input('category_id'),
            'location_id'   => $request->input('location_id'),
            'price'         => $request->input('price')
        ]);
    }

    public function destroy(Item $item)
    {
        $item->delete();
    }
}
