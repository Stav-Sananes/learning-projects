@extends('layouts.app')
@section('content')
@if (\Auth::User()->is_admin)
<form class="needs-validation"  action="{{route('cars.update',$cars->id) }}" method ="POST" >
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">שם חברת הרכב?</label>
            <input type="text" class="form-control" id="validationCustom01"  value="{{ $cars->brand }}" name="brand" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">שם הרכב</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->car_name }}" name="car_name" required> 
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">ליטר בגאז</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->liter_baggage }}" name="liter_baggage" required> 
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">מקומות ישיבה</label>
            <input type="text" class="form-control" id="validationCustom01"  value="{{ $cars->number_of_seats }}" name="number_of_seats" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">דרגת זיהום הרכב</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->car_pollution }}"name="car_pollution" required> 
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">4 On 4 ?</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->four_on_four }}" name="four_on_four" required> 
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">שם חברת הרכב?</label>
            <input type="text" class="form-control" id="validationCustom01"   value="{{ $cars->crusie_control }}"name="crusie_control" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">שם הרכב</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->reverse_camera }}"name="reverse_camera" required> 
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">ליטר בגאז</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->autonomous_braking }}" name="autonomous_braking" required> 
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">סוג הרכב</label>
            <input type="text" class="form-control" id="validationCustom01"  value="{{ $cars->type_of_car }}" name="type_of_car" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">מחיר</label>
            <input type="text" class="form-control" id="validationCustom02"  value="{{ $cars->price }}"name="price" required> 
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom02">מודל הרכב</label>
            <input type="text" class="form-control" id="validationCustom02" value="{{ $cars->model_of_car }}" name="model_of_car" required> 
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                חתימה ואישור הקמת בנק.
            </label>
            <div class="invalid-feedback">
                אנא אשרו יצירת בנק.
            </div>
        </div>
    </div>

    <button class="btn btn-primary" type="submit">שליחת טופס</button>
</form>
@endsection
@else
<h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif