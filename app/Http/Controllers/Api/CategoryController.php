<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Http\Request; // needed?

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::with('parent')->get());
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent')
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
