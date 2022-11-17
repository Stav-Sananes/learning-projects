@extends('layouts.app')

@if (\Auth::User()->is_admin)
    @section('content')
        <div class="card  mt-2" style="margin:3%">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('cars.create') }}" class="btn btn-primary text-white">הוספת רכב </a>
                    <h4>
                        רכבים
                    </h4>
                    <a href="/home" class="btn btn-info text-white">חזרה למסך השאלות</a>
                </div>
                <div class="mt-4 mr-2">

                    <form class="form-inline my-lg-2  justify-content-center" type="get" style="margin-right: 75px"
                        action="{{ route('cars.index', ['id' => 1]) }}">
                        <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">חפש</button>
                        <input class="form-control mr-sm-2 text-center ml-2" type="search" placeholder="חיפוש רכב"
                            aria-label="Search" name="query">
                    </form>
                </div>
            </div>
            <div class="card-body" style="margin:3%;direction:rtl">

                <table class="table table-striped">
                    <thead class="text-center">

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
                            <th scope="col">מחיקה</th>
                            <th scope="col">עריכה</th>
                        </tr>


                    </thead>
                    <tbody class="text-center">
                        @foreach ($cars as $car)
                           

                            <td>{{ $car->id }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->car_name }}</td>
                            <td>{{ $car->liter_baggage }}</td>
                            <td>{{ $car->number_of_seats }}</td>
                            <td>{{ $car->car_pollution }}</td>
                            <td>{{ $car->four_on_four == 0 ? 'לא' : 'כן' }}</td>
                            <td>{{ $car->crusie_control == 0 ? 'לא' : 'כן' }}</td>
                            <td>{{ $car->reverse_camera == 0 ? 'לא' : 'כן' }}</td>
                            <td>{{ $car->autonomous_braking ? 'לא' : 'כן' }}</td>
                            @if ($car->type_of_car == 0)
                                <td>ספורט</td>
                            @elseif ($car->type_of_car == 1)
                                <td>משפחתי</td>
                            @elseif ($car->type_of_car == 2)
                                <td>מנהלים</td>
                            @endif
                            <td> ₪ {{ number_format($car->price,2,'.',',')  }} </td>
                            @if ($car->model_of_car == 0)
                                <td>לא חשמלית</td>
                            @elseif ($car->model_of_car == 1)
                                <td>חשמלית</td>
                            @elseif ($car->model_of_car == 2)
                                <td>היברדית</td>
                            @endif

                        
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
                            <td>
                                <a href="{{ route('cars.show', ['car' => $car->id]) }}" class="btn btn-dark text-white">
                                    ערוך נתוני רכב
                                </a>
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
