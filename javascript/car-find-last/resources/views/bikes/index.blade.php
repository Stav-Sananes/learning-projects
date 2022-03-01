@extends('layouts.app')
@section('script')

    <script>
        function myForm() {
            var inputs = document.getElementsByClassName("cb"); // TagName("input");
            var CheckAll = document.getElementById("CheckAll");
            for (var i = 0; i < inputs.length; i++) {
                if (CheckAll.checked == true) {
                    inputs[i].checked = true;
                } else {
                    inputs[i].checked = false;
                }
            }
        }
    </script>
@endsection
@if (\Auth::User()->is_admin)
@section('content')
<div class="card  mt-2">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4>
                רכבים
            </h4>
            <a href="{{ route('bikes.create') }}" class="btn btn-primary">הוספת אופנוע </a>
            <a  href="{{ route('bikes') }}" class="btn btn-info">חזרה למסך השאלות</a> 
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="חיפוש אופנוע" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חפש</button>
        </form>
    </div>
    <div class="card-body">

        <table class="table table-striped">
            <thead>
                <tr>
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
                    <td>
                        <input id="CheckAll" type="checkbox" name="CheckAll" onchange="myForm()">
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($bikes as $bike)
                    <td>
                        <a href="{{ route('bikes.show', ['bike'=>$bike->id]) }}" class="btn btn-dark">
                            ערוך נתוני אופנוע
                        </a>
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
    
                    <td>
                        <form action="{{ route('bikes.destroy', $bike) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-center">
                            <button class="btn btn-xs btn-danger " onclick="return confirm('Are you sure?')"
                                type="submit">מחיקה</button>
                            </div>
                        </form>
                    </td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@else
<h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif