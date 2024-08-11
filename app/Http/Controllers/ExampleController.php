<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

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
        $products = Product::latest()->get()->take(3);
        return view('index',compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function test()
    {
       // $result = Student::find(1)->phone->phone_no;
       // dd($result);
       
        DB::table('students')
        ->join('phones', 'phones.id', '=', 'students.phone_id')
        ->where('students.id', '=', 1)
        ->first();
    }

}
