@extends('layouts.app')

@section('content')
    <div style="margin:3%">
       
        <div class="d-flex justify-content-center mb-3">
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חיפוש מתקדם</button>
                <input class="form-control mr-sm-2 ml-2" type="search" placeholder="חיפוש רכב" aria-label="Search" name="four_on_four">
                
            </form>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="חיפוש רכב" aria-label="Search" name="query">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חפש</button>
                
            </form>
            <a type="button" class="btn btn-outline-primary ml-2" href="{{ url('/search') }}">איפוס חיפוש</a>
        </div>

        <div class="w-100 d-flex justify-content-center text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">שם רכב</th>
                        <th scope="col">חברת הרכב</th>
                        <th scope="col">מחיר</th>
                        <th scope="col">ליטר בגאז</th>
                        <th scope="col">4X4</th>
                        <th scope="col">בעל בקרת שיוט</th>
                        <th scope="col">סוג מכונית</th>
                        <th scope="col">מודל רכב</th>
                        <th scope="col">מערכת בלימה אוטונומית</th>
                        <th scope="col">דרגת זיהום ברכב</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars_data as $car)
                        <tr>
                            <th scope="row">{{ $car->car_name }}</th>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->price }},000₪</td>
                            <td>{{ $car->liter_baggage }}</td>
                            <td>{{ $car->four_on_four ? 'כן' : 'ללא' }}</td>
                            <td>{{ $car->cruise_control ? 'כן' : 'ללא' }}</td>
                            <td>{{ $car->number_of_seats ? 'כן' : 'ללא' }}</td>
                            <td>{{ $car->type_of_car }}</td>
                            <td>{{ $car->autonomous_braking ? 'כן' : 'ללא' }}</td>
                            <td>{{ $car->car_pollution }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <a type="button" class="btn btn-outline-info" href="{{ route('home') }}">לשאלות הרכבים</a>
        </div>
    </div>
@endsection
