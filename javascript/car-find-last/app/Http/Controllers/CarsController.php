<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'car_name' => 'required',
            'liter_baggage' => 'required',
            'number_of_seats' => 'required',
            'type_of_car' => 'required',
            'car_pollution' => 'required',
            '4on4' => 'required',
            'reverse_camera' => 'required',
            'crusie_control' => 'required',
            'autonomous_braking' => 'required',
            'price' => 'required',
            'model_of_car' => 'required',
            'picture_1' => 'required',
            'picture_2' => 'required',
        ]);
        \App\Models\Cars::Create([
            'car_name' => $request->input('car_name'),
            'liter_baggage' => $request->input('liter_baggage'),
            'number_of_seats' => $request->input('number_of_seats'),
            'car_pollution' => $request->input('car_pollution'),
            '4on4' => $request->input('4on4'),
            'reverse_camera' => $request->input('reverse_camera'),
            'crusie_control' => $request->input('crusie_control'),
            'price' => $request->input('price'),
            'model_of_car' => $request->input('model_of_car'),
            'type_of_car' => $request->input('type_of_car'),
        ]);
        return view('cars.show', compact('cars'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cars.show', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cars.edit', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\Cars $cars)
    {    
         $request->validate([
        'car_name' => 'required',
        'liter_baggage' => 'required',
        'number_of_seats' => 'required',
        'car_name' => 'required',
        'car_pollution' => 'required',
        '4on4' => 'required',
        'reverse_camera' => 'required',
        'crusie_control' => 'required',
        'autonomous_braking' => 'required',
        'price' => 'required',
        'model_of_car' => 'required',
        'picture_1' => 'required',
        'picture_2' => 'required',
    ]);
          $cars->update($request->all());
        return redirect()->route('cars.index');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Cars $cars)
    {
        $cars->delete();
        return redirect()->route('cars.index')
        ->with('success', 'car deleted successfully');
    }
}
