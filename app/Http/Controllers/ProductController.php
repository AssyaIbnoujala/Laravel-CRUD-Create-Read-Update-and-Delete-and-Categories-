<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Models\Category;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}


    // public function create()
    // {
    //     return view('products.create');
    // }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

//     public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'name' => 'required|string|max:255',
//         'price' => 'required|numeric',
//         'category_id' => 'required|exists:categories,id',
//     ]);

//     Product::create($validatedData);

//     return redirect()->route('products.index');
// }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ]);

    Product::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'] ?? '', // Utilisez une valeur par défaut si description est vide
        'price' => $validatedData['price'],
        'category_id' => $validatedData['category_id'],
    ]);

    return redirect()->route('products.index');
}

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'price' => 'required',
    //         'category_id' => 'required',
    //     ]);

    //     Product::create($request->all());

    //     return redirect()->route('products.index')->with('success', 'Product created successfully.');
    // }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    // public function edit($id)
    // {
    //     $product = Product::find($id);
    //     return view('products.edit', compact('product'));
    // }
    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}


    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'price' => 'required',
    //         'category_id' => 'required',
    //     ]);

    //     Product::find($id)->update($request->all());

    //     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    // }
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ]);

    $product->update($validatedData);

    return redirect()->route('products.index');
}


    // public function destroy($id)
    // {
    //     Product::find($id)->delete();

    //     return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    // }

    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index');
}

}
