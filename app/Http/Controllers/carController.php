<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Car::create([
            'carTitle' => $request['carTitle'],
            'price' => $request['price'],
            'description' => $request['description'],
            'published' => isset($request['published']),
        ]);

        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'carTitle' => $request['carTitle'],
            'price' => $request['price'],
            'description' => $request['description'],
            'published' => isset($request['published']),
        ];
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
}
