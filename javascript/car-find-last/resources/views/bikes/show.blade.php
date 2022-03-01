@extends('layouts.app')
@section('content')
@if (\Auth::User()->is_admin)
<ul class="nav nav-tabs d-flex justify-content-center mb-5" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">מידע כללי</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
            <div class="d-flex flex-row h-100 justify-content-lg-between w-100 p-1">
                <a href="{{route('bikes.index')}}" class="btn btn-success">חזרה לפרטי האופנוע</a>
                <a  href="{{route('bikes.create')}}" class="btn btn-primary">ליצירת אופנוע חדש</a> 
               <a  href="{{route('bikes.edit',['bike'=>$bike->id])}}" class="btn btn-warning">ערוך נתוני אופנוע</a> 
              
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        
                        <th scope="col">#</th>
                        <th scope="col">שם חברת האופנוע</th>
                        <th scope="col">שם האופנוע</th>
                        <th scope="col">צילנדרים</th>  
                        <th scope="col">סוג הנעה</th> 
                        <th scope="col">מחיר</th>     
                        <th scope="col">סוג הפצה באופנוע</th>
                        <th scope="col">סוג מנוע</th>
                        <th scope="col">קיבולת דלק</th>
                        <th scope="col">מהלך מנוע</th> 
                        <th scope="col">מודל האופנוע</th>
                        <th scope="col">שסתומים בכול צילנדר</th>    
                        <th scope="col">מערכת קירור</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$bike->id}}</th>
                        <td>{{$bike->brand}}</td>
                        <td>{{$bike->bike_name}}</td>
                        <td>{{$bike->cylinders}}</td>
                        <td>{{$bike->starter}}</td>
                      
                        <td>{{$bike->price}}</td>
                        <td>{{$bike->transmission_type}}</td>
                        <td>{{$bike->engine_type}}</td>
                        <td>{{$bike->fuel_captacity}}</td>
                        <td>{{$bike->engine_stroke}}</td>
                        <td>{{$bike->model_of_bike}}</td>
                        <td>{{$bike->valves_per_cylinder}}</td>
                        <td>{{$bike->cooling_system}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

   
</div>
@endsection
@else
<h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif