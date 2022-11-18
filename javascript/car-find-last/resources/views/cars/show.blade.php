@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <ul class="nav nav-tabs d-flex justify-content-center mb-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('cars.index') }}" class="nav-link active">חזרה לפרטי הרכב</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('cars.create') }}" class="nav-link active"> רכב חדש</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('cars.edit', ['car' => $car->id]) }}" class="nav-link active">ערוך
                    נתוני
                    רכב</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent" style="padding: 5%;">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    </div>
                    <table class="table" style="direction: rtl;">
                        <thead class="thead-light">
                            <tr class="text-center">

                                <th scope="col">#</th>
                                <th scope="col">שם חברת הרכב</th>
                                <th scope="col">שם הרכב</th>
                                <th scope="col">ליטר בגאז</th>
                                <th scope="col">מקומות ישיבה</th>
                                <th scope="col">דרגת זיהום אוויר</th>
                                <th scope="col">4 X 4</th>
                                <th scope="col">בקרת שיוט</th>
                                <th scope="col">מצלמת רוורס</th>
                                <th scope="col">מערכת בלימה אוטונומית</th>
                                <th scope="col">סוג רכב</th>
                                <th scope="col">מחיר</th>
                                <th scope="col">מודל המכונית</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th scope="row">{{ $car->id }}</th>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->car_name }}</td>
                                @if ($car->liter_baggage == 1)
                                    <td>150</td>
                                @elseif ($car->liter_baggage == 2)
                                    <td>350</td>
                                @elseif ($car->liter_baggage == 3)
                                    <td>500</td>
                                @endif
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
                                <td>₪ {{ number_format($car->price, 2, '.', ',') }} </td>
                                @if ($car->model_of_car == 0)
                                    <td>לא חשמלית</td>
                                @elseif ($car->model_of_car == 1)
                                    <td>חשמלית</td>
                                @elseif ($car->model_of_car == 2)
                                    <td>היברדית</td>
                                @endif
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div>
                    <img class="card-text text-center w-25"
                        src="/storage/{{ $car->picture_1 ? $car->picture_1 : null }}" />
                </div>
            </div>


        </div>
    @endsection
@else
    <h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif
