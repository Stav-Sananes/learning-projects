@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <form class="needs-validation" action="{{ route('bikes.update', $bike->id) }}" method="POST" style="margin:3%"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="d-flex flex-row h-100 justify-content-lg-between w-100 p-1">
                <a href="{{ route('bikes.index') }}" class="btn btn-success text-white">חזרה לפרטי האופנוע</a>
                <a href="{{ route('bikes.create') }}" class="btn btn-primary text-white">ליצירת אופנוע חדש</a>
                <a href="/bike" class="btn btn-warning text-white">חזרה למסך השאלות</a>

            </div>
            <div class="card-body text-center" style="direction: rtl">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">שם חברת האופנוע?</label>
                        <input type="text" class="form-control" id="validationCustom01" value="{{ $bike->brand }}"
                            name="brand" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">שם האופנוע</label>
                        <input type="text" class="form-control" id="validationCustom02" value="{{ $bike->bike_name }}"
                            name="bike_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">צילנדרים באופנוע</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $bike->cylinders }}" name="cylinders" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">סטרטר</label>
                        <input type="text" class="form-control" id="validationCustom01"
                            value="{{ $bike->starter }}" name="starter" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מחיר</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $bike->price }}" name="price" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">סוג הפצה</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $bike->transmission_type }}" name="transmission_type" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">סוג מנוע</label>
                        <input type="text" class="form-control" id="validationCustom01"
                            value="{{ $bike->engine_type }}" name="engine_type" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">קיבולת דלק</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $bike->fuel_captacity }}" name="fuel_captacity" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מהלך מנוע</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $bike->engine_stroke }}" name="engine_stroke" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">מודל האופנוע</label>
                        <input type="text" class="form-control" id="validationCustom01" value="{{ $bike->model_of_bike }}"
                            name="model_of_bike" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">שסתומים לכול צילנדר</label>
                        <input type="text" class="form-control" id="validationCustom02" value="{{ $bike->valves_per_cylinder }}"
                            name="valves_per_cylinder" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מערכת קירור</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $bike->cooling_system }}" name="cooling_system" required>
                    </div>
                </div>
                <div class="text-center">
                    <input id="picture_1" type="file" name="picture_1" />
                </div>
                <div class="form-group text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            אנא אשרו עריכת רכב קיים במערכת
                        </label>
                        <div class="invalid-feedback">
                            אנא אשרו עריכת אופנוע
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">עריכת רכב</button>
                </div>
            </div>
        </form>
        <style>
            input[type="file"] {
                display: none;
            }

        </style>
    @endsection
@else
    <h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif
