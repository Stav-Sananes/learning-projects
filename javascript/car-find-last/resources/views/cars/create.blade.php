@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <div class="card" style="margin:3%">
            <form class="needs-validation" action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data"
                style="margin:3%">
                @csrf
                <div class="card-body text-center">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">שם חברת הרכב</label>
                            <input type="text" class="form-control" id="validationCustom01" name="brand" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">שם הרכב</label>
                            <input type="text" class="form-control" id="validationCustom02" name="car_name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">ליטר בגאז</label>
                            <input type="number" class="form-control" id="validationCustom02" name="liter_baggage"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">מקומות ישיבה</label>
                            <select class="form-control text-center" name="number_of_seats" id="number_of_seats">
                                <option value="2"> 2 </option>
                                <option value="5">5</option>
                            </select>
                                
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">דרגת זיהום הרכב</label>
                            <select class="form-control text-center" name="car_pollution" id="car_pollution">
                                <option value="1">(הכי פחות מזהם)-1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">(הכי מזהם)-15</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">4 On 4 </label>
                            <select class="form-control text-center" name="four_on_four" id="four_on_four">
                                <option value="0">לא</option>
                                <option value="1">כן</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">בקרת שיוט</label>

                            <select class="form-control text-center" name="crusie_control" id="crusie_control">
                                <option value="0">לא</option>
                                <option value="1">כן</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">מצלמת רוורס</label>

                            <select class="form-control text-center" name="reverse_camera" id="reverse_camera">
                                <option value="0">לא</option>
                                <option value="1">כן</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">מערכת בלימה אוטונומית</label>

                            <select class="form-control text-center" name="autonomous_braking" id="autonomous_braking">
                                <option value="0">לא</option>
                                <option value="1">כן</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">סוג הרכב</label>
                            <select class="form-control text-center" name="type_of_car" id="type_of_car">
                                <option value="0">מנהלים</option>
                                <option value="1">משפחתי</option>
                                <option value="2">ספורט</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">מחיר</label>
                            <select class="form-control text-center" name="price" id="price">
                                <option value="50000">50,000</option>
                                <option value="100000">100,000</option>
                                <option value="150000">150,000</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-3 ">
                            <label for="validationCustom02">מודל הרכב</label>

                            <select class="form-control text-center" name="model_of_car" id="model_of_car">
                                <option value="0">חשמלית</option>
                                <option value="1">היברדית</option>
                                <option value="2">בנזין</option>
                            </select>

                        </div>

                    </div>
                </div>
                <div class="text-center">
                  
                        <label class="custom-file-upload">
                       
                            <input  type="file" id="picture_1" name="picture_1" /> תמונת רכב
                        </label>
                    
                </div>
                <div class="form-group text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            חתימה ואישור הקמת רכב.
                        </label>

                    </div>
                </div>
                <div class="text-center">
                    <button data-toggle="tooltip" data-placement="top" title="אישור יצירת רכב" class="btn btn-primary"
                        type="submit">הקמת רכב</button>
                </div>
                <div class="text-center mt-3">
                    <a type="button" class="btn btn-success " href="{{ route('cars.index', ['id' => 1]) }}">מעבר לטבלת
                        הרכבים</a>
                </div>
            </form>
        </div>
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
