@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <ul class="nav nav-tabs d-flex justify-content-center mb-5" id="myTab" role="tablist">
          
            <li class="nav-item" role="presentation">
                <a href="{{ route('bikes.index') }}" id="index-tab" data-toggle="tab" href="#index" role="tab"
                    aria-controls="index" class="nav-link active">חזרה לפרטי האופנוע</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('bikes.create') }}" id="create-tab" data-toggle="tab" href="#create" role="tab"
                    aria-controls="create" class="nav-link active">ליצירת אופנוע חדש</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('bikes.edit', ['bike' => $bike->id]) }}" id="edit-tab" data-toggle="tab" href="#edit"
                    role="tab" aria-controls="edit" class=" nav-link  active">ערוך
                    נתוני
                    אופנוע</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <div class="d-flex flex-row h-100 justify-content-lg-between w-100 p-1">
                    </div>
                    <table class="table" style="direction: rtl">
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

                            <th scope="row">{{ $bike->id }}</th>
                            <td>{{ $bike->brand }}</td>
                            <td>{{ $bike->bike_name }}</td>
                            <td>{{ $bike->cylinders }}</td>
                            <td>{{ $bike->starter }}</td>

                            <td>₪ {{ number_format($bike->price, 2, '.', ',') }}</td>
                            @if ($bike->transmission_type == 0)
                                <td>Automatic Transmission</td>
                            @elseif ($bike->transmission_type == 1)
                                <td>Manual Transmission</td>
                            @elseif ($bike->transmission_type == 2)
                                <td>Automated Manual Transmission </td>
                            @elseif ($bike->transmission_type == 3)
                                <td>Continuously Variable Transmission </td>
                            @endif
                            <td>{{ $bike->engine_type }}</td>
                            <td>{{ $bike->fuel_captacity }}</td>
                            <td>{{ $bike->engine_stroke }}</td>
                            <td>{{ $bike->model_of_bike }}</td>
                            <td>{{ $bike->valves_per_cylinder }}</td>
                            @if ($bike->cooling_system == 0)
                                <td>נוזלית</td>
                            @elseif ($bike->cooling_system == 1)
                                <td>מערכת קירור אוויר ושמן</td>
                            @elseif ($bike->cooling_system == 2)
                                <td>מערכת קירור אוויר</td>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    @endsection
@else
    <h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif
