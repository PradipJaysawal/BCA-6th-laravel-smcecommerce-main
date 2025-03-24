<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        return response()->json([
            'msg' => 'Category Fetched Successfully',
            'data' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'priority'=>'required',
            'name'=>'required',
        ]);

        $category = Category::create($data);

        return response()->json([
            'success' => 'true',
            'message' => 'Category created successfully',
        ]);
    }
}
