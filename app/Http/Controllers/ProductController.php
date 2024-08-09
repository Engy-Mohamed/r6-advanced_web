<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    public function index()
    {
        $products = Product::get();
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|decimal:0,2|between:5,9999999999.99',
            'shortDescription' => 'required|string|max:300',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $file_name = $this->uploadFile($request['image'], 'assets/images/product');
        $data['image'] = $file_name;

        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|decimal:0,2|between:5,9999999999.99',
            'shortDescription' => 'required|string|max:300',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $file_name = ($request->hasFile('image')) ? $this->uploadFile($request['image'], 'assets/images/product') : $request['old_image'];
        $data['image'] = $file_name;

        Product::where('id', $id)->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "delete fn";
    }
}
