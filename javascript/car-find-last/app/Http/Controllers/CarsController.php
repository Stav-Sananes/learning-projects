<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = \App\Models\Cars::all();  
       

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = \App\Models\Cars::all();
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'brand' => 'required|string',
            'car_name' => 'required|string',
            'liter_baggage' => 'required|integer',
            'number_of_seats' => 'required|integer',
            'type_of_car' => 'required|integer',
            'car_pollution' => 'required|integer',
            'four_on_four' => 'required|integer',
            'reverse_camera' => 'required|integer',
            'crusie_control' => 'required|integer',
            'autonomous_braking' => 'required|integer',
            'price' => 'required|integer',
            'model_of_car' => 'required|integer',
            'picture_1' => 'nullable|string',
            'picture_2' => 'nullable|string',
        ]);
       
        \App\Models\Cars::Create([
            'car_name' => $request->input('car_name'),
            'brand' => $request->input('brand'),
            'liter_baggage' => $request->input('liter_baggage'),
            'number_of_seats' => $request->input('number_of_seats'),
            'car_pollution' => $request->input('car_pollution'),
            'autonomous_braking' => $request->input('autonomous_braking'),
            'four_on_four' => $request->input('four_on_four'),
            'reverse_camera' => $request->input('reverse_camera'),
            'crusie_control' => $request->input('crusie_control'),
            'price' => $request->input('price'),
            'model_of_car' => $request->input('model_of_car'),
            'type_of_car' => $request->input('type_of_car'),
        ]);
    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $car = \App\Models\Cars::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = \App\Models\Cars::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\Cars $car)
    {    
        $request->validate([
            'brand' => 'required|string',
            'car_name' => 'required|string',
            'liter_baggage' => 'required|integer',
            'number_of_seats' => 'required|integer',
            'type_of_car' => 'required|integer',
            'car_pollution' => 'required|integer',
            'four_on_four' => 'required|integer',
            'reverse_camera' => 'required|integer',
            'crusie_control' => 'required|integer',
            'autonomous_braking' => 'required|integer',
            'price' => 'required|integer',
            'model_of_car' => 'required|integer',
            'picture_1' => 'nullable|string',
            'picture_2' => 'nullable|string',
        ]);
        $car->update($request->all());

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $filepath = 'profile_pictures/';
        $file = Storage::disk('local')->put($filepath, $avatar);
        $car->update([
            'avatar' => $file
        ]);
    }
          $car->update($request->all());
        return redirect()->route('cars.index');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Cars $car)
    {
        $car->delete();
        return redirect()->route('cars.index')
        ->with('success', 'car deleted successfully');
       
    }
    /* public function FindCars(){
        $findCars = \App\Models\Cars::when($from_date,function ($query) use ($from_date)
        {
            return $query->whereDate('created_at', '>=',$from_date);
        })
    } */
}
