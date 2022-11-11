@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <form class="needs-validation" action="{{ route('cars.update', $car->id) }}" method="POST"
            enctype="multipart/form-data" style="margin:3%">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="d-flex flex-row h-100 justify-content-lg-between w-100 p-1">
                <a href="{{ route('cars.index') }}" class="btn btn-success text-white">חזרה לפרטי הרכב</a>
                <a href="{{ route('cars.create') }}" class="btn btn-primary text-white">ליצירת רכב חדש</a>
                <a href="/home" class="btn btn-warning">חזרה למסך השאלות</a>

            </div>
            <div class="card-body text-center" >
                <div class="form-row ">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">שם חברת הרכב?</label>
                        <input type="text" class="form-control" id="validationCustom01" value="{{ $car->brand }}"
                            name="brand" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">שם הרכב</label>
                        <input type="text" class="form-control" id="validationCustom02" value="{{ $car->car_name }}"
                            name="car_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">ליטר בגאז</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $car->liter_baggage }}" name="liter_baggage" required>
                    </div>
                </div>
                <div class="form-row" >
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">מקומות ישיבה</label>
                        <input type="text" class="form-control" id="validationCustom01"
                            value="{{ $car->number_of_seats }}" name="number_of_seats" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">דרגת זיהום הרכב</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $car->car_pollution }}" name="car_pollution" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">4 On 4 ?</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $car->four_on_four }}" name="four_on_four" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">שם חברת הרכב?</label>
                        <input type="text" class="form-control" id="validationCustom01"
                            value="{{ $car->crusie_control }}" name="crusie_control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">שם הרכב</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $car->reverse_camera }}" name="reverse_camera" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">ליטר בגאז</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $car->autonomous_braking }}" name="autonomous_braking" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">סוג הרכב</label>
                        <input type="text" class="form-control" id="validationCustom01" value="{{ $car->type_of_car }}"
                            name="type_of_car" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מחיר</label>
                        <input type="text" class="form-control" id="validationCustom02" value="{{ $car->price }}"
                            name="price" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מודל הרכב</label>
                        <input type="text" class="form-control" id="validationCustom02"
                            value="{{ $car->model_of_car }}" name="model_of_car" required>
                    </div>
                </div>
                <div class="text-center">
                    <input id="picture_1" type="file" name="picture_1" />
                    <label for="picture_1" class="custom-file-upload">
                        <a class="btn btn-info">תמונת רכב ראשונה</a>
                    </label>
                
                   
                </div>
                <div class="form-group text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            אנא אשרו עריכת רכב קיים במערכת
                        </label>
                        <div class="invalid-feedback">
                            אנא אשרו עריכת רכב
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
