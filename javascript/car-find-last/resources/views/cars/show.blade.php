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
                <a href="{{route('cars.index')}}" class="btn btn-success">חזרה לפרטי הרכב</a>
                <a  href="{{route('cars.create')}}" class="btn btn-primary">ליצירת רכב חדש</a> 
               <a  href="{{route('cars.edit',['car'=>$car->id])}}" class="btn btn-warning">ערוך נתוני רכב</a> 
              
            </div>
            <table class="table">
                <thead class="thead-light">
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
                </thead>
                <tbody>
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

                </tbody>
            </table>
        </div>
    </div>

   
</div>
@endsection
@else
<h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif