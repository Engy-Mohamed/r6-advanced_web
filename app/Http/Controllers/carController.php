<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\category;
use Illuminate\Http\Request;
use App\Traits\Common;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::select('id','name')->get();
        return view('add_car',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000', 
            'price' => 'required|decimal:0,2|between:10000,9999999999.99',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        $file_name = $this->uploadFile($request['image'], 'assets\images\cars');

        $data['image'] = $file_name;
        $data['published'] =  isset($request['published']);
        Car::create($data);

        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('category')->findOrFail($id);
        $car['image'] = 'assets/images/cars/' . $car['image'];
        return view('car_details', compact('car'));
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $car['image'] = 'assets/images/cars/' . $car['image'];
        $categories = category::select('id','name')->get();
        return view('edit_car', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000', 
            'price' => 'required|decimal:0,2|between:10000,9999999999.99',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'published' => 'required:boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $file_name = ($request->hasFile('image')) ? $this->uploadFile($request['image'], 'assets/images'):$request['old_image'];
        $data['image'] = $file_name;

        Car::where('id', $id)->update($data);

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars.index');
    }

    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed_cars', compact('cars'));

    }
    public function restore(Request $request)
    {
    
        Car::where('id', $request['id'])->restore();
        return redirect()->route('cars.showDeleted');
    }
    public function force_delete(Request $request)
    {
        Car::where('id', $request['id'])->forceDelete();
        return redirect()->route('cars.showDeleted');
    }
}
