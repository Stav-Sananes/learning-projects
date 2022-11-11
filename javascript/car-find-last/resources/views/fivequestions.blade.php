@extends('layouts.app')

@section('content')
    @if (\Auth::User()->is_admin)
        <div class="container mb-3 text-center">
            <div class="row ">
                <div class="col-6">
                    <a type="button" class="btn btn-outline-primary " href="{{ route('cars.index', ['id' => 1]) }}">מעבר לטבלת
                        הרכבים</a>
                </div>
                <div class="col-6">
                    <a type="button" class="btn btn-outline-success" href="{{ route('cars.create') }}">להוספת רכב</a>
                </div>

            </div>
        </div>
    @endif
    <form class="needs-validation"  method="GET" dir="rtl" action="{{ route('finish_five') }}">
        <div class="container" style="max-width: 1460px;">
            <div class="row justify-content-center">
                <div class="col-md">
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-info" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">למידע על תהליך מציאת
                            הרכבים</button>

                        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop"
                            aria-labelledby="offcanvasTopLabel">
                            <div class="offcanvas-header">
                                <div>
                                    <h2 id="offcanvasTopLabel">Car-Find</h2>
                                </div>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body text-center fw-bolder">
                                כאן תעברו עשרה שאלות שבהם תצטרכו לענות על מנת למצוא את הרכב שאתם הכי רוצים גם כשאין לכם
                                באמת
                                ידע ברכבים
                            </div>
                            <div class="offcanvas-body text-center mt-3 fw-bolder">
                                <p>אם במקרה והגעתם לכאן בטעות ואתם מחפשים לעבור לשאלות האופנועים לחצו כאן</p>
                                <a type="button" class="btn btn-danger text-white" href="{{ route('bikes') }}">לשאלות האופנועים</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        
                        <div class="card-header text-center fw-bolder">{{ __('טבלת השאלות') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}

                                </div>
                            @endif

                            <ul class="nav nav-tabs d-flex justify-content-between" id="mytabs" role="tablist">
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
                             

                            </ul>
                            <div class="tab-content text-center" id="myTabContent">
                                <div class="tab-pane fade show active" id="question1" role="tabpanel"
                                    aria-labelledby="question1-tab">
                                    <h5 class="card-title mt-3">ליטר בגאז</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold ">

                                                <p class="card-text mt-2">0-200</p>
                                                <input type="radio" class="btn-check" name="liter_baggage" id="option0"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option0">בחירה</label>



                                            </div>
                                        </div>
                                        <div class="card ml-3 mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text mt-2">200-400</p>
                                                <input type="radio" class="btn-check" name="liter_baggage" id="option1"
                                                    autocomplete="off" value="1">
                                                <label class="btn btn-outline-danger" for="option1">בחירה</label>
                                            </div>

                                        </div>

                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text mt-2">400+</p>
                                                <input type="radio" class="btn-check" name="liter_baggage" id="option2"
                                                    autocomplete="off" value="2">
                                                <label class="btn btn-outline-info" for="option2">בחירה</label>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                                <div class="tab-pane fade" id="question2" role="tabpanel" aria-labelledby="question2-tab">
                                    <h5 class="card-title mt-3">רכב 4 על 4</h5>
                                    <div class="d-flex justify-content-center">

                                        <div class="card ml-3" style="width: 18rem;">

                                            <div class="card-body">

                                                <p class="card-text fw-bold">כן</p>

                                                <input type="radio" class="btn-check" name="four_on_four" id="option3"
                                                    autocomplete="off" value="1">
                                                <label class="btn btn-outline-success" for="option3">בחירה</label>

                                            </div>

                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא</p>
                                                <input type="radio" class="btn-check" name="four_on_four" id="option4"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger" for="option4">בחירה</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="question3" role="tabpanel" aria-labelledby="question3-tab">
                                    <h5 class="card-title mt-3">? רכב עם בקרת שיוט</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card ml-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">כן</p>
                                                <input type="radio" class="btn-check" name="crusie_control"
                                                    id="option5" autocomplete="off" value="1">
                                                <label class="btn btn-outline-success" for="option5">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא</p>
                                                <input type="radio" class="btn-check" name="crusie_control"
                                                    id="option6" autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger" for="option6">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question4" role="tabpanel" aria-labelledby="question4-tab">
                                    <h5 class="card-title mt-3">? מקומות ישיבה</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card ml-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">2 מקומות ישיבה</p>
                                                <input type="radio" class="btn-check" name="number_of_seats"
                                                    id="option7" autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option7">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">מעל 2 מקומות ישיבה ברכב</p>
                                                <input type="radio" class="btn-check" name="number_of_seats"
                                                    id="option8" autocomplete="off" value="0">
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
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option9">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card ml-3 mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">משפחתי</p>
                                                <input type="radio" class="btn-check" name="type_of_car" id="option10"
                                                    autocomplete="off" value="1">
                                                <label class="btn btn-outline-danger" for="option10">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">מנהלים</p>
                                                <input type="radio" class="btn-check" name="type_of_car" id="option11"
                                                    autocomplete="off" value="2">
                                                <label class="btn btn-outline-info" for="option11">בחירה</label>
                                            </div>
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
                        <button type="submit" class="btn btn-primary"> סיום ומעבר לקבלת התשובות</button>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </form>

<style>
    [type='radio'] {
        display: none;
    }

</style>

@endsection
