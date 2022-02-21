@extends('layouts.app')
@section('content')
    <form class="needs-validation" action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="card-body text-center">
            <div class="form-row ">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">שם חברת הרכב?</label>
                    <input type="text" class="form-control" id="validationCustom01" name="brand" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">שם הרכב</label>
                    <input type="text" class="form-control" id="validationCustom02" name="car_name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">ליטר בגאז</label>
                    <input type="number" class="form-control" id="validationCustom02" name="liter_baggage" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">מקומות ישיבה</label>
                    <input type="number" class="form-control" id="validationCustom01" name="number_of_seats" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">דרגת זיהום הרכב</label>
                    <input type="number" class="form-control" id="validationCustom02" name="car_pollution" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">4 On 4 ?</label>
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
                    <input type="number" class="form-control" id="validationCustom02" name="price" required>
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
    </form>
@endsection
