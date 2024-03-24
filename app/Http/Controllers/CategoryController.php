<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    

   

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

 public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::find($id)->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
