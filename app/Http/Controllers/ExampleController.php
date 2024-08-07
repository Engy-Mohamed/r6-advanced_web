<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ExampleController extends Controller
{
    public function uploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get()->take(3);
        return view('index',compact('products'));
    }

    public function about()
    {
        return view('about');
    }

}
