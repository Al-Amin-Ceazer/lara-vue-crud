<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Psy\Util\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => str_replace(' ','-',$request->name),
        ]);

        return response()->json('success',201);
    }


    public function show(Category $category)
    {
        return response()->json($category);
    }


    public function edit(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $category->name = $request->name;
        $category->slug = str_replace(' ','-',$request->name);
        $category->save();

        return response()->json('success',200);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json('success', 200);
    }
}
