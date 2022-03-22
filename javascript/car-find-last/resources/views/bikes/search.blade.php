@extends('layouts.app')

@section('content')
<div style="margin:3%">
    <div class="d-flex justify-content-center mb-3">
        <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search/bike') }}">
            <input class="form-control mr-sm-2" type="search" placeholder="חיפוש אופנוע" aria-label="Search" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חפש</button>
        </form>
        <a type="button" class="btn btn-outline-primary ml-2" href="{{ url('/search/bike') }}">איפוס חיפוש</a>
    </div>

    <div class="w-100 d-flex justify-content-center text-center">
        <table class="table table-bordered">
            <thead>
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
                @foreach ($bike_data as $bike)
                    <tr>
                        <th scope="row">{{$bike->id}}</th>
                        <td>{{$bike->brand}}</td>
                        <td>{{$bike->bike_name}}</td>
                        <td>{{$bike->cylinders}}</td>
                        <td>{{$bike->starter}}</td>
                      
                        <td>{{$bike->price}},000₪</td>
                        <td>{{$bike->transmission_type}}</td>
                        <td>{{$bike->engine_type}}</td>
                        <td>{{$bike->fuel_captacity}}</td>
                        <td>{{$bike->engine_stroke}}</td>
                        <td>{{$bike->model_of_bike}}</td>
                        <td>{{$bike->valves_per_cylinder}}</td>
                        <td>{{$bike->cooling_system}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <a type="button" class="btn btn-outline-info" href="{{ route('bikes') }}">לשאלות האופנועים</a>
    </div>
</div>
@endsection
