<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Mail\contactUs;
use Illuminate\Support\Facades\Mail;

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
    public function contact_us()
    {
        return view('contact_us');
    }
    public function store(Request $request)
    { 
        $data = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string|max:1000', 
            'subject' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns',
        ]);
        //Mail::to($request->user())->send(new contactUs($data));
        $admin_email = "Hr@laravel.com";
        Mail::to($admin_email )->send(new contactUs($data));
        return "Thank you for contacting us";
    }
}
