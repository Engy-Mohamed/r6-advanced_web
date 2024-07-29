<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::get();
        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'class_name' => 'required|alpha_num:ascii|max:255',
            'capacity' => 'required|numeric|min:1', 
            'price' => 'required|decimal:0,2',
            'time_From' => 'required|date|after:tomorrow',
            'time_to' => 'required|date|after:time_From',
        ]);
        $data['is_fulled'] = $request['is_fulled'] == "on" ? true : false;
        Classes::create($data);

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $class)
    {
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'class_name' => $request['class_name'],
            'capacity' => $request['capacity'],
            'is_fulled' => $request['is_fulled'] == "on" ? true : false,
            'price' => $request['price'],
            'time_From' => $request['time_From'],
            'time_to' => $request['time_to'],

        ];
        Classes::where('id', $id)->update($data);

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request):RedirectResponse
    {
        Classes::where('id', $request['id'])->delete();
        return redirect()->route('classes.index');
    }
    public function showDeleted()
    {
        $classes = Classes::onlyTrashed()->get();
        return view('trashed_classes', compact('classes'));

    }
    public function restore(Request $request)
    {

        Classes::where('id', $request['id'])->restore();
        return redirect()->route('classes.showDeleted');
    }
    public function force_delete(Request $request)
    {
        Classes::where('id', $request['id'])->forceDelete();
        return redirect()->route('classes.showDeleted');
    }
}
