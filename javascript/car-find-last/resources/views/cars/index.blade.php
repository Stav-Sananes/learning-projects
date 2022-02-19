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
@section('content')
<div class="card  mt-2">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>
                בנקים
            </span>
            <a href="{{ route('banks.create') }}" class="btn btn-primary">הוספת בנק </a>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="חיפוש בנק" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חפש</button>
        </form>
    </div>
    <div class="card-body">

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
                        <a href="{{ route('cars.show', ['cars' => $car->id]) }}">
                            {{ $bank->id }}
                        </a>
                        <tr>
                            <th scope="row">{{$cars->id}}</th>
                            <td>{{$cars->brand}}</td>
                            <td>{{$cars->car_name}}</td>
                            <td>{{$cars->liter_baggage}}</td>
                            <td>{{$cars->number_of_seats}}</td>
                          
                            <td>{{$cars->car_pollution}}</td>
                            <td>{{$cars->4on4}}</td>
                            <td>{{$cars->crusie_control}}</td>
                            <td>{{$cars->reverse_camera}}</td>
                            <td>{{$cars->autonomous_braking}}</td>
                            <td>{{$cars->type_of_car}}</td>
                            <td>{{$cars->price}}</td>
                            <td>{{$cars->model_of_car}}</td>
                        </tr>
    
                    <td>

                        <form action="{{ route('cars.destroy', $car) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"
                                type="submit">מחיקה</button>
                        </form>
                    </td>
                    <td><input type="checkbox" class="cb" value=""></input></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection