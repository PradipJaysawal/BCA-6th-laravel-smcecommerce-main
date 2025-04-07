<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        return response()->json($categories);
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

    public function update(Request $request, $id){
        $data = $request->validate([
            'priority' => 'required',
            'name' => 'required',
        ]);

        $category = Category::find($id);
        $category->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Category update successfully',
        ]);
    }

    public function destory(Request $request)
    {
        $Category = Category::find($request->id);
        $product = Product::where('category_id',$Category->id)->count();

        if($product > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Category has products',
            ]);
        }
        $Category->delete();
        return response()->json([
            'success' => true,
            'message' => 'Category Delete Successfully',
        ]);
    }
}
