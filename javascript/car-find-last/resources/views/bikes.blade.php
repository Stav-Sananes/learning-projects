@extends('layouts.app')

@section('content')
    @if (\Auth::User()->is_admin)
        <div class="container mb-3 text-center">
            <div class="row ">
                <div class="col-6">
                    <a type="button" class="btn btn-primary" href="{{ route('bikes.index', ['id' => 1]) }}">מעבר לטבלת
                        אופנועים</a>
                </div>
                <div class="col-6">
                    <a type="button" class="btn btn-success" href="{{ route('bikes.create') }}">להוספת אופנוע</a>
                </div>

            </div>
        </div>
    @endif
    <form class="needs-validation" action="{{ route('finish') }}" method="GET">
        <div class="container" style="max-width: 1460px;">
            <div class="row justify-content-center">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header text-center fw-bolder">{{ __('טבלת השאלות') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}

                                </div>
                            @endif

                            <ul class="nav nav-tabs" id="mytabs" role="tablist">
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link active" id="question1-tab" data-bs-toggle="tab"
                                        data-bs-target="#question1" type="button" role="tab" aria-controls="question1"
                                        aria-selected="true">שאלה מספר 1</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question2-tab" data-bs-toggle="tab"
                                        data-bs-target="#question2" type="button" role="tab" aria-controls="question2"
                                        aria-selected="false">שאלה מספר 2</button>

                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question3-tab" data-bs-toggle="tab"
                                        data-bs-target="#question3" type="button" role="tab" aria-controls="question3"
                                        aria-selected="false">שאלה מספר 3</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question4-tab" data-bs-toggle="tab"
                                        data-bs-target="#question4" type="button" role="tab" aria-controls="question4"
                                        aria-selected="false">שאלה מספר 4</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question5-tab" data-bs-toggle="tab"
                                        data-bs-target="#question5" type="button" role="tab" aria-controls="question5"
                                        aria-selected="false">שאלה מספר 5</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question6-tab" data-bs-toggle="tab"
                                        data-bs-target="#question6" type="button" role="tab" aria-controls="question6"
                                        aria-selected="false">שאלה מספר 6</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question7-tab" data-bs-toggle="tab"
                                        data-bs-target="#question7" type="button" role="tab" aria-controls="question7"
                                        aria-selected="false">שאלה מספר 7</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question8-tab" data-bs-toggle="tab"
                                        data-bs-target="#question8" type="button" role="tab" aria-controls="question8"
                                        aria-selected="false">שאלה מספר 8</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question9-tab" data-bs-toggle="tab"
                                        data-bs-target="#question9" type="button" role="tab" aria-controls="question9"
                                        aria-selected="false">שאלה מספר 9</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="question10-tab" data-bs-toggle="tab"
                                        data-bs-target="#question10" type="button" role="tab" aria-controls="question10"
                                        aria-selected="false">שאלה מספר 10</button>
                                </li>

                            </ul>
                            <div class="tab-content text-center" id="myTabContent">
                                <div class="tab-pane fade show active" id="question1" role="tabpanel"
                                    aria-labelledby="question1-tab">
                                    <h5 class="card-title mt-3">מערכת קירור</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3 " style="width: 18rem;">

                                            <div class="card-body fw-bold ">

                                                <p class="card-text mt-2">נוזלית</p>
                                                <input type="radio" class="btn-check" name="cooling_system" id="option0"
                                                    autocomplete="off" value="2" >
                                                <label class="btn btn-outline-success" for="option0">בחירה</label>



                                            </div>
                                        </div>
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text mt-2">מערכת קירור אוויר ושמן</p>
                                                <input type="radio" class="btn-check" name="cooling_system" id="option1"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-danger" for="option1">בחירה</label>
                                            </div>

                                        </div>

                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text mt-2">מערכת קירור אוויר</p>
                                                <input type="radio" class="btn-check" name="cooling_system" id="option2"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-info" for="option2">בחירה</label>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                                <div class="tab-pane fade" id="question2" role="tabpanel" aria-labelledby="question2-tab">
                                    <h5 class="card-title mt-3">סוג אופנוע</h5>
                                    <div class="d-flex justify-content-center">

                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body">

                                                <p class="card-text fw-bold">כן</p>

                                                <input type="radio" class="btn-check" name="four_on_four" id="option3"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-success" for="option3">בחירה</label>

                                            </div>

                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא</p>
                                                <input type="radio" class="btn-check" name="four_on_four" id="option4"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-danger" for="option4">בחירה</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="question3" role="tabpanel" aria-labelledby="question3-tab">
                                    <h5 class="card-title mt-3">סוג מנוע</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">כן</p>
                                                <input type="radio" class="btn-check" name="cruise_control" id="option5"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-success" for="option5">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">צילנדרים</p>
                                                <input type="radio" class="btn-check" name="cruise_control" id="option6"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-danger" for="option6">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question4" role="tabpanel" aria-labelledby="question4-tab">
                                    <h5 class="card-title mt-3">סטרטר מותאם אישית</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">2 מקומות ישיבה</p>
                                                <input type="radio" class="btn-check" name="number_of_seats" id="option7"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option7">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">מספר הפצה באופנוע</p>
                                                <input type="radio" class="btn-check" name="number_of_seats" id="option8"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-danger" for="option8">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question5" role="tabpanel" aria-labelledby="question5-tab">
                                    <h5 class="card-title mt-3">? סוג מכונית </h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">ספורט</p>
                                                <input type="radio" class="btn-check" name="type_of_car" id="option9"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option9">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">משפחתי</p>
                                                <input type="radio" class="btn-check" name="type_of_car" id="option10"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-danger" for="option10">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">מנהלים</p>
                                                <input type="radio" class="btn-check" name="type_of_car" id="option11"
                                                    autocomplete="off" value="2" >
                                                <label class="btn btn-outline-info" for="option11">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question6" role="tabpanel" aria-labelledby="question6-tab">
                                    <h5 class="card-title mt-3">מערכת בלימה אוטונומית קיימת ברכב</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">כן</p>
                                                <input type="radio" class="btn-check" name="autonomous_braking" id="option12"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option12">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא</p>
                                                <input type="radio" class="btn-check" name="autonomous_braking" id="option13"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-danger" for="option13">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question7" role="tabpanel" aria-labelledby="question7-tab">
                                    <h5 class="card-title mt-3">? דרגת זיהום אוויר באופנוע</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">משנה</p>
                                                <input type="radio" class="btn-check" name="car_pollution" id="option14"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option14">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא משנה</p>
                                                <input type="radio" class="btn-check" name="car_pollution" id="option15"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-danger" for="option15">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">12+</p>
                                                <input type="radio" class="btn-check" name="car_pollution" id="option16"
                                                    autocomplete="off" value="2" >
                                                <label class="btn btn-outline-info" for="option16">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question8" role="tabpanel" aria-labelledby="question8-tab">
                                    <h5 class="card-title mt-3">? מחיר</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold">

                                                <p class="card-text">עד 10</p>
                                                <input type="radio" class="btn-check" name="price" id="option17"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option17">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold  ">

                                                <p class="card-text">עד 30</p>
                                                <input type="radio" class="btn-check" name="price" id="option18"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-danger" for="option18">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card " style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">30+</p>
                                                <input type="radio" class="btn-check" name="price" id="option19"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-info" for="option19">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question9" role="tabpanel" aria-labelledby="question9-tab">
                                    <h5 class="card-title mt-3">? מצלמת רוורס</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card d-flex justify-content-center  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold">

                                                <p class="card-text ">כן</p>
                                                <input type="radio" class="btn-check" name="reverse_camera" id="option20"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option20">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card d-flex justify-content-center  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold">

                                                <p class="card-text">לא</p>
                                                <input type="radio" class="btn-check" name="reverse_camera" id="option21"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-danger" for="option21">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question10" role="tabpanel"
                                    aria-labelledby="question10-tab">
                                    <h5 class="card-title mt-3">? מודל רכב</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא חשמלית</p>
                                                <input type="radio" class="btn-check" name="model_of_car" id="option22"
                                                    autocomplete="off" value="0" >
                                                <label class="btn btn-outline-success" for="option22">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">חשמלית</p>
                                                <input type="radio" class="btn-check" name="model_of_car" id="option23"
                                                    autocomplete="off" value="1" >
                                                <label class="btn btn-outline-danger" for="option23">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">היברדית</p>
                                                <input type="radio" class="btn-check" name="model_of_car" id="option24"
                                                    autocomplete="off" value="2" >
                                                <label class="btn btn-outline-info" for="option24">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          {{--   <div class="text-center mt-4">
                                <button type="button" id="changetabbutton" class="btn btn-primary ">לשלב הבא</button>
                            </div> --}}
                        </div>

                    </div>
                    <div class="text-center mt-5">
                        <button type="button" type="submit" class="btn btn-primary"> סיום ומעבר לקבלת התשובות</button>
                    </div>
                    <div class="text-center mt-3">
                        <a type="button" class="btn btn-danger" href="{{ route('home') }}">לשאלות הרכבים</a>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </form>

{{-- @section('script')
    <script>
        $(function() {

            $('#changetabbutton').click(function(e) {
                e.preventDefault();
                var link = $('#mytabs .active').next().children('a').attr('href');

                $('#mytabs a[href="' + link + '"]').tab('show');
            });

        });
    </script>
@endsection --}}
<style>
    [type='radio'] {
        display: none;
    }

</style>

@endsection
