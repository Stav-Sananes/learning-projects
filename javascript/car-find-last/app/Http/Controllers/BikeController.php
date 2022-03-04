<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = \App\Models\Bike::all();  
       

        return view('bikes.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bikes = \App\Models\Bike::all();
        return view('bikes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, \App\Models\Bike $bike)
    {
        
        $request->validate([
            'brand' => 'required|string',
            'bike_name' => 'required|string',
            'model_of_bike' => 'required|string',
            'cooling_system' => 'required|integer',
            'engine_type' => 'required|string',
            'cylinders' => 'required|integer',
            'starter' => 'required|integer',
            'valves_per_cylinder' => 'required|integer',
            'transmission_type' => 'required|integer',
            'fuel_captacity' => 'required|integer',
            'engine_stroke' => 'required|integer',
            'price' => 'required|integer',
            'picture_1' => 'nullable',
            'picture_2' => 'nullable',
        ]);
      
       
        \App\Models\Bike::Create([
            'brand' => $request->input('brand'),
            'bike_name' => $request->input('bike_name'),
            'cooling_system' => $request->input('cooling_system'),
            'cylinders' => $request->input('cylinders'),
            'starter' => $request->input('starter'),
            'valves_per_cylinder' => $request->input('valves_per_cylinder'),
            'transmission_type' => $request->input('transmission_type'),
            'engine_type' => $request->input('engine_type'),
            'fuel_captacity' => $request->input('fuel_captacity'),
            'price' => $request->input('price'),
            'engine_stroke' => $request->input('engine_stroke'),
            'model_of_bike' => $request->input('model_of_bike'),
        ]);
        
        if ($request->hasFile('picture_1')) {
      
            $picture_1 = $request->file('picture_1');
            $filepath = 'bikes/';
            $file = Storage::disk('local')->put($filepath, $picture_1);
            $bike->update([
                'picture_1' => $file
            ]);
          
        }
      
        if ($request->hasFile('picture_2')) {
          
            $picture_2 = $request->file('picture_2');
            $filepath = 'bikes/';
            $file = Storage::disk('local')->put($filepath, $picture_2);
            $bike->update([
                'picture_2' => $file
            ]);
        }    
       
    
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
        $bike = \App\Models\Bike::findOrFail($id);
        return view('bikes.show', compact('bike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bike = \App\Models\Bike::findOrFail($id);
        return view('bikes.edit', compact('bike'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\Bike $bike)
    {
        $request->validate([
            'brand' => 'required|string',
            'bike_name' => 'required|string',
            'cooling_system' => 'required|integer',
            'cylinders' => 'required|integer',
            'starter' => 'required|integer',
            'valves_per_cylinder' => 'required|integer',
            'transmission_type' => 'required|integer',
            'engine_type' => 'required|integer',
            'fuel_captacity' => 'required|integer',
            'engine_stroke' => 'required|integer',
            'price' => 'required|integer',
            'model_of_bike' => 'required|integer',
            'picture_1' => 'nullable',
            'picture_2' => 'nullable',
        ]);
        if ($request->hasFile('picture_1')) {
      
            $picture_1 = $request->file('picture_1');
            $filepath = 'bikes/';
            $file = Storage::disk('local')->put($filepath, $picture_1);
            $bike->update([
                'picture_1' => $file
            ]);
          
        }
      
        if ($request->hasFile('picture_2')) {
          
            $picture_2 = $request->file('picture_2');
            $filepath = 'bikes/';
            $file = Storage::disk('local')->put($filepath, $picture_2);
            $bike->update([
                'picture_2' => $file
            ]);
        }
        $bike->update($request->all());
        return redirect()->route('bikes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Bike $bike)
    {
        $bike->delete();
        return redirect()->route('bikes.index')
        ->with('success', 'car deleted successfully');
    }
    public function FindBikes(Request $request)
    {
       $liter_baggage = $request->input('liter_baggage') ?  $request->input('liter_baggage') : null;
       $four_on_four = $request->input('four_on_four') ?  $request->input('four_on_four') : null;
       $cruise_control = $request->input('cruise_control') ?  $request->input('cruise_control') : null;
       $number_of_seats = $request->input('number_of_seats') ?  $request->input('number_of_seats') : null;
       $type_of_car = $request->input('type_of_car') ?  $request->input('type_of_car') : null;
       $autonomous_braking = $request->input('autonomous_braking') ?  $request->input('autonomous_braking') : null;
       $car_pollution = $request->input('car_pollution') ?  $request->input('car_pollution') : null;
       $price = $request->input('price') ?  $request->input('price') : null;
       $reverse_camera = $request->input('reverse_camera') ?  $request->input('reverse_camera') : null;
       $model_of_car = $request->input('model_of_car') ?  $request->input('model_of_car') : null;
       
       $findCars = \App\Models\Cars::
       when($liter_baggage,function ($query) use ($liter_baggage){
           return $query->where('liter_baggage', $liter_baggage);
       })
       ->when($four_on_four,function ($query) use ($four_on_four) {
           return $query->where('four_on_four',  $four_on_four);
       })
       ->when($cruise_control,function ($query) use ($cruise_control) {
           return $query->where('cruise_control', $cruise_control);
       })
       ->when($number_of_seats,function ($query) use ($number_of_seats) {
           return $query->where('number_of_seats', $number_of_seats);
       })
       ->when($type_of_car,function ($query) use ($type_of_car) {
           return $query->where('type_of_car', $type_of_car);
       })
       ->when($autonomous_braking,function ($query) use ($autonomous_braking) {
           return $query->where('autonomous_braking', $autonomous_braking);
       })
       ->when($car_pollution,function ($query) use ($car_pollution){
           return $query->where('car_pollution', $car_pollution);
       })
       ->when($price,function ($query) use ($price){
           return $query->where('price',$price);
       })
       ->when($reverse_camera,function ($query) use ($reverse_camera){
           return $query->where('reverse_camera',$reverse_camera);
       })
       ->when($model_of_car,function ($query) use ($model_of_car){
           return $query->where('model_of_car' , $model_of_car);
       })
       ->orderBy('price','desc');
       return view('cars.finish')
       ->with('cars',$findCars);
   }
}
