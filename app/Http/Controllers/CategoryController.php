<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all(['id','title','description']);
        return response()->json($categories);
    }


    public function store(Request $request){
        $categories=Category::create($request->post());
        return response()->json([
            'message'=>'Category Created Successfully!!',
            'category'=>$categories
        ]);
    }

    public function show(Category $category){
        return response()->json($category);
    }
}
