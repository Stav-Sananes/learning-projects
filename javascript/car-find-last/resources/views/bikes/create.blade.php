@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <form class="needs-validation" action="{{ route('bikes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="  card-body text-center">
            <div class="form-row ">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">שם חברת האופנוע?</label>
                    <input type="text" class="form-control" id="validationCustom01" name="brand" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">שם האופנוע</label>
                    <input type="text" class="form-control" id="validationCustom02" name="bike_name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">סוג הפצה באופנוע</label>
                    <input type="number" class="form-control" id="validationCustom02" name="transmission_type" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">סוג מנוע</label>
                    <input type="number" class="form-control" id="validationCustom01" name="engine_type" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">קיבולת דלק</label>
                    <input type="number" class="form-control" id="validationCustom02" name="fuel_captacity" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">מודל האופנוע</label>
                    <select class="form-control text-center" name="four_on_four" id="model_of_bike">
                        <option value="0">לא</option>
                        <option value="1">כן</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">שסתומים בצלינדר</label>

                    <select class="form-control text-center" name="crusie_control" id="valves_per_cylinder">
                        <option value="0">לא</option>
                        <option value="1">כן</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">מערכת קירור</label>

                    <select class="form-control text-center" name="reverse_camera" id="cooling_system">
                        <option value="0">לא</option>
                        <option value="1">כן</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">מהלך מנוע</label>

                    <select class="form-control text-center" name="autonomous_braking" id="engine_stroke">
                        <option value="0">לא</option>
                        <option value="1">כן</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">צילנדרים</label>

                    <select class="form-control text-center" name="type_of_car" id="cylinders">
                        <option value="0">מנהלים</option>
                        <option value="1">משפחתי</option>
                        <option value="2">ספורט</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">מחיר</label>
                    <input type="number" class="form-control" id="validationCustom02" name="price" required>
                </div>
                <div class="form-group col-md-4 mb-3 ">
                    <label for="validationCustom02">מודל הרכב</label>

                    <select class="form-control text-center" name="model_of_car" id="starter">
                        <option value="0">חשמלית</option>
                        <option value="1">היברדית</option>
                        <option value="2">בנזין</option>
                    </select>

                </div>

            </div>
            </div>
            <div class="text-center">
                <input id="picture_1" type="file" name="picture_1" />
                <label for="picture_1" class="custom-file-upload">
                    <a class="btn btn-info">תמונת אופנוע ראשונה</a>
                </label>
            
                <input id="picture_2" type="file" name="picture_2" />
                <label for="picture_2" class="custom-file-upload">
                    <a class="btn btn-danger">תמונת אופנוע שנייה</a>
                </label>
            </div>
            <input id="file-upload" type="file" />
            <div class="form-group text-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        חתימה ואישור הקמת אופנוע.
                    </label>

                </div>
            </div>
            <div class="text-center">
                <button data-toggle="tooltip" data-placement="top" title="אישור יצירת אופנוע" class="btn btn-primary"
                    type="submit">הקמת אופנוע</button>
            </div>
            <div class="text-center mt-3">
                <a type="button" class="btn btn-success " href="{{ route('bikes.index', ['id' => 1]) }}">מעבר לטבלת
                    אופנוע</a>
            </div>
        </form>
       
        <style>
            input[type="file"] {
                display: none;
            }

            .custom-file-upload {
                border: 1px solid #ccc;
                display: inline-block;
                padding: 6px 12px;
                cursor: pointer;
            }

        </style>
        
    @endsection
@else
    <h1 class="text-center"> You need to be an admin to watch this content</h1>
@endif
