<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = \App\Models\Cars::all();  
        if($request->get('query')){
            $name=$request->get('query');
            $cars= Cars::where('car_name', 'LIKE','%'. $name . '%')
            ->get();
            return view('cars.index',compact('cars'));
        }
        
        return view('cars.index', compact('cars'));
    }
    public function search(Request $request)
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
        
        $name=$request->get('query');
        $cars_data= Cars::where('car_name', 'LIKE','%'. $name . '%')
        ->get();
        return view('cars.search',compact('cars_data'));
        if(!$request->get('query')){
            $cars_data= Cars::where('four_on_four', 'LIKE','%'. $four_on_four . '%')
        ->orWhere('crusie_control', 'LIKE','%'. $cruise_control . '%')
        ->orWhere('number_of_seats', 'LIKE','%'. $number_of_seats . '%')
        ->orWhere('type_of_car', 'LIKE','%'. $type_of_car . '%')
        ->orWhere('autonomous_braking', 'LIKE','%'. $autonomous_braking . '%')
        ->orWhere('car_pollution', 'LIKE','%'. $car_pollution . '%')
        ->orWhere('price', 'LIKE','%'. $price . '%')
        ->orWhere('reverse_camera', 'LIKE','%'. $reverse_camera . '%')
        ->get();
        return view('cars.search',compact('cars_data'));
        }
        /*  */
       
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
    public function store(Request $request, \App\Models\Cars $car)
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
            'picture_1' => 'required|nullable',
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
        
        
       /*  if ($request->hasFile('picture_1')) {
      
            $picture_1 = $request->file('picture_1');
            $filepath = 'cars/';
            $file = Storage::disk('local')->put($filepath, $picture_1);
            $car->update([
                'picture_1' => $file
            ]);
          
        } */
        
        
         $imagePath = request('picture_1')->store('uploads','public');
         if($imagePath){
            \App\Models\Cars::Create([
                'picture_1'=> $imagePath
            ]);
            dd($imagePath);
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
            'picture_1' => 'nullable',
            'picture_2' => 'nullable',
        ]);
      

    if ($request->hasFile('picture_1')) {
      
        $picture_1 = $request->file('picture_1');
        $filepath = 'cars/';
        $file = Storage::disk('local')->put($filepath, $picture_1);
        $car->update([
            'picture_1' => $file
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
    public function FindCars(Request $request)
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
        ->orderBy('price','desc')
            ->limit(3)
            ->get();
        return view('cars.finish')
        ->with('findCars',$findCars);
    }

}
