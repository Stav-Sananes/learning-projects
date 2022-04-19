<?php

namespace App\Http\Controllers;

use App\Models\Bike;
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
    public function index(Request $request)
    {
        $bikes = \App\Models\Bike::all();  
        if($request->get('query')){
            $name=$request->get('query');
            $bikes= Bike::where('bike_name', 'LIKE','%'. $name . '%')
            ->get();
            return view('bikes.index',compact('bikes'));
        }

        return view('bikes.index', compact('bikes'));
    }
    public function search(Request $request)
    {
        $name=$request->get('query');
        $bike_data= Bike::where('bike_name', 'LIKE','%'. $name . '%')->get();
        return view('bikes.search',compact('bike_data'));
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
            'picture_1' => 'required|nullable',
            
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
            'picture_1' => 'required|nullable',
        ]);
      /*   if ($request->hasFile('picture_1')) {
      
            $picture_1 = $request->file('picture_1');
            $filepath = 'bikes/';
            $file = Storage::disk('local')->put($filepath, $picture_1);
            $bike->update([
                'picture_1' => $file
            ]);
          
        } */
        $imagePath = request('picture_1')->store('uploads','public');
        if($imagePath){
           \App\Models\Bike::Create([
               'picture_1'=> $imagePath
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
       $brand = $request->input('brand') ?  $request->input('brand') : null;
       $model_of_bike = $request->input('model_of_bike') ?  $request->input('model_of_bike') : null;
       $engine_type = $request->input('engine_type') ?  $request->input('engine_type') : null;
       $cylinders = $request->input('cylinders') ?  $request->input('cylinders') : null;
       $starter = $request->input('starter') ?  $request->input('starter') : null;
       $transmission_type = $request->input('transmission_type') ?  $request->input('transmission_type') : null;
       $fuel_captacity = $request->input('fuel_captacity') ?  $request->input('fuel_captacity') : null;
       $price = $request->input('price') ?  $request->input('price') : null;
       $engine_stroke = $request->input('engine_stroke') ?  $request->input('engine_stroke') : null;
       $cooling_system = $request->input('cooling_system') ?  $request->input('cooling_system') : null;
       
       $findBikes = \App\Models\Bike::
       when($brand,function ($query) use ($brand){
           return $query->where('brand', $brand);
       })
       ->when($model_of_bike,function ($query) use ($model_of_bike) {
           return $query->where('model_of_bike',  $model_of_bike);
       })
       ->when($engine_type,function ($query) use ($engine_type) {
           return $query->where('engine_type', $engine_type);
       })
       ->when($cylinders,function ($query) use ($cylinders) {
           return $query->where('cylinders', $cylinders);
       })
       ->when($starter,function ($query) use ($starter) {
           return $query->where('starter', $starter);
       })
       ->when($transmission_type,function ($query) use ($transmission_type) {
           return $query->where('transmission_type', $transmission_type);
       })
       ->when($fuel_captacity,function ($query) use ($fuel_captacity){
           return $query->where('fuel_captacity', $fuel_captacity);
       })
       ->when($price,function ($query) use ($price){
           return $query->where('price',$price);
       })
       ->when($engine_stroke,function ($query) use ($engine_stroke){
           return $query->where('engine_stroke',$engine_stroke);
       })
       ->when($cooling_system,function ($query) use ($cooling_system){
           return $query->where('cooling_system' , $cooling_system);
       })
       ->orderBy('price','desc')
       ->limit(3)
        ->get();
       return view('bikes.finish')
       ->with('findBikes',$findBikes);
   }
}
