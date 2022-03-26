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
<div class="card  mt-2" style="margin:3%">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4>
                רכבים
            </h4>
            <a href="{{ route('cars.create') }}" class="btn btn-primary">הוספת רכב </a>
            <a  href="/home" class="btn btn-info">חזרה למסך השאלות</a> 
        </div>
        <form class="form-inline my-2 my-lg-0" type="get" action="{{ route('cars.index', ['id' => 1]) }}">
            <input class="form-control mr-sm-2" type="search" placeholder="חיפוש רכב" aria-label="Search" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חפש</button>
        </form>
    </div>
    <div class="card-body" style="margin:3%">

        <table class="table table-striped">
            <thead>
                <tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">שם חברת הרכב</th>
                        <th scope="col">שם הרכב</th>
                        <th scope="col">ליטר בגאז</th> 
                        <th scope="col">מקומות ישיבה</th>     
                        <th scope="col">דרגת זיהום אוויר</th>
                        <th scope="col">4 On 4</th>
                        <th scope="col">בקרת שיוט</th>
                        <th scope="col">מצלמת רוורס</th> 
                        <th scope="col">מערכת בלימה אוטונומית</th>
                        <th scope="col">סוג רכב</th>    
                        <th scope="col">מחיר</th>  
                        <th scope="col">מודל המכונית</th>  
                    </tr>
                    <td>
                        <input id="CheckAll" type="checkbox" name="CheckAll" onchange="myForm()">
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <td>
                        <a href="{{ route('cars.show', ['car'=>$car->id]) }}" class="btn btn-dark">
                            ערוך נתוני רכב
                        </a>
                        <tr>
                            <th scope="row">{{$car->id}}</th>
                            <td>{{$car->brand}}</td>
                            <td>{{$car->car_name}}</td>
                            <td>{{$car->liter_baggage}}</td>
                            <td>{{$car->number_of_seats}}</td>
                          
                            <td>{{$car->car_pollution}}</td>
                            <td>{{$car->four_on_four}}</td>
                            <td>{{$car->crusie_control}}</td>
                            <td>{{$car->reverse_camera}}</td>
                            <td>{{$car->autonomous_braking}}</td>
                            <td>{{$car->type_of_car}}</td>
                            <td>{{$car->price}}</td>
                            <td>{{$car->model_of_car}}</td>
                        </tr>
    
                    <td>
                        <form action="{{ route('cars.destroy', $car) }}" method="POST">
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