@extends('layouts.app')

@if (\Auth::User()->is_admin)
    @section('content')
        <div class="card  mt-2" style="margin:3%">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('bikes.create') }}" class="btn btn-primary text-white">הוספת אופנוע </a>
                    <h4>
                        אופנועים
                    </h4>
                    <a href="{{ route('bikes') }}" class="btn btn-info text-white">חזרה למסך השאלות</a>
                </div>

                <form class="form-inline my-2 my-lg-0 justify-content-center" type="get" style="margin-right: 75px"
                    action="{{ route('bikes.index', ['id' => 1]) }}">
                    <input class="form-control mr-sm-2" type="search" placeholder="חיפוש אופנוע" aria-label="Search"
                        name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">חפש</button>
                </form>
            </div>
            <div class="card-body">

                <table class="table table-striped text-center" style="direction:rtl ">
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
                            <th scope="col">מחיקה</th>
                            <th scope="col">עריכה</th>
                        </tr>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bikes as $bike)
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
                            <td>
                                <a href="{{ route('bikes.show', ['bike' => $bike->id]) }}"
                                    class="btn btn-dark text-white ">
                                    ערוך נתוני אופנוע
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
