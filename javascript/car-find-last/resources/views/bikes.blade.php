@extends('layouts.app')

@section('content')
    @if (\Auth::User()->is_admin)
        <div class="container mb-3 text-center">
            <div class="row ">
                <div class="col-6">
                    <a type="button" class="btn btn-outline-primary" href="{{ route('bikes.index', ['id' => 1]) }}">מעבר לטבלת
                        אופנועים</a>
                </div>
                <div class="col-6">
                    <a type="button" class="btn btn-outline-success" href="{{ route('bikes.create') }}">להוספת אופנוע</a>
                </div>

            </div>
        </div>
    @endif
    <form class="needs-validation" action="{{ route('finish') }}" method="GET" dir="rtl">
        <div class="container" style="max-width: 1460px;">
            <div class="row justify-content-center">
                <div class="col-md">
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" 
                            data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">למידע על תהליך מציאת
                            האופנועים</button>

                        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop"
                            aria-labelledby="offcanvasTopLabel">
                            <div class="offcanvas-header">
                                <div>
                                    <h2 id="offcanvasTopLabel">Bike-Find</h2>
                                </div>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body text-center fw-bolder">
                                כאן תעברו תשעה שאלות שבהם תצטרכו לענות על מנת למצוא את האופנוע שאתם הכי רוצים גם כשאין לכם
                                באמת
                                ידע באופנועים
                            </div>
                            <div class="offcanvas-body text-center mt-3 fw-bolder ">
                                <p>אם במקרה והגעתם לכאן בטעות ואתם מחפשים לעבור לשאלות הרכבים לחצו כאן</p>
                                <a type="button" class="btn btn-info" href="{{ route('home') }}">לשאלות הרכבים</a>

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


                            </ul>
                            <div class="tab-content text-center" id="myTabContent">
                                <div class="tab-pane fade show active" id="question1" role="tabpanel"
                                    aria-labelledby="question1-tab">
                                    <h5 class="card-title mt-3">חברת האופנוע</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">
                                                <select class="form-control text-center" name="brand" id="brand">
                                                    <option value="Aprilia">Aprilia</option>
                                                    <option value="BMW">BMW</option>
                                                    <option value="Can-Am | BRP">Can-Am | BRP</option>
                                                    <option value="Ducati-Road">Ducati-Road</option>
                                                    <option value="Harley-Davidson">Harley-Davidson</option>
                                                    <option value="Honda">Honda</option>
                                                    <option value="Husqvarna">Husqvarna</option>
                                                    <option value="Indian">Indian</option>
                                                    <option value="Kawasaki">Kawasaki</option>
                                                    <option value="KTM">KTM</option>
                                                    <option value="Kymco">Kymco</option>
                                                    <option value="Moto Guzzi">Moto Guzzi</option>
                                                    <option value="MV Agusta">MV Agusta</option>
                                                    <option value="Piaggio">Piaggio</option>
                                                    <option value="Suzuki">Suzuki</option>
                                                    <option value="Triumph">Triumph</option>
                                                    <option value="Vespa">Vespa</option>
                                                    <option value="Yamaha">Yamaha</option>
                                                    <option value="Zero">Zero</option>

                                                </select>
                                            </div>

                                        </div>


                                    </div>



                                </div>
                                <div class="tab-pane fade" id="question2" role="tabpanel" aria-labelledby="question2-tab">
                                    <h5 class="card-title mt-3">סוג אופנוע</h5>
                                    <div class="d-flex justify-content-center">

                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body">



                                                <select class="form-control text-center" name="model_of_bike"
                                                    id="model_of_bike">
                                                    <option value="Sport">ספורט</option>
                                                    <option value="Cruiser">קרוזר</option>
                                                    <option value="Touring">טיולים</option>
                                                    <option value="Off-Road">שטח</option>
                                                    <option value="Scooter">טוסטוס</option>
                                                    <option value="Track">מירוצים</option>
                                                    <option value="Standard">רגיל</option>
                                                    <option value="Electric">חשמלי</option>
                                                    <option value="Sport-Touring">ספורט טיולי</option>
                                                    <option value="On-Off-Road">On-Off-Road</option>
                                                    <option value="Youth">צעירים</option>
                                                    <option value="Touring-Scooter">טוסטוס טיולי</option>
                                                </select>

                                            </div>

                                        </div>


                                    </div>

                                </div>
                                <div class="tab-pane fade" id="question3" role="tabpanel" aria-labelledby="question3-tab">
                                    <h5 class="card-title mt-3">סוג מנוע</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <select class="form-control text-center" name="engine_type"
                                                    id="engine_type">
                                                    <option value="Inline Engines">מנוע מוטבע</option>
                                                    <option value="Single Cylinder">בעל צילנדר אחד</option>
                                                    <option value="Parallel Twin">תאומים מקבילים</option>
                                                    <option value="Inline Triple and Four">מנוע מוטבע עם שלוש וארבע</option>
                                                    <option value="V Engines">V Engines</option>
                                                    <option value="V Twin">V Twin</option>
                                                    <option value="V Four">V Four</option>
                                                    <option value="Flat Engines">מנועים שטוחים</option>
                                                    <option value="Flat 2">שטוחים עם 2</option>
                                                    <option value="Flat 4">שטוח עם 4</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question4" role="tabpanel" aria-labelledby="question4-tab">
                                    <h5 class="card-title mt-3">סטרטר מותאם אישית</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card ml-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">כן</p>
                                                <input type="radio" class="btn-check" name="starter" id="option7"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option7">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא</p>
                                                <input type="radio" class="btn-check" name="starter" id="option8"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger" for="option8">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question5" role="tabpanel" aria-labelledby="question5-tab">
                                    <h5 class="card-title mt-3">צילנדרים</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">עד 2</p>
                                                <input type="radio" class="btn-check" name="cylinders" id="option9"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option9">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text fw-bold">2+</p>
                                                <input type="radio" class="btn-check" name="cylinders" id="option10"
                                                    autocomplete="off" value="1">
                                                <label class="btn btn-outline-danger" for="option10">בחירה</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question6" role="tabpanel" aria-labelledby="question6-tab">
                                    <h5 class="card-title mt-3">מערכת קירור</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card mr-3 " style="width: 18rem;">

                                            <div class="card-body fw-bold ">

                                                <p class="card-text mt-2">נוזלית</p>
                                                <input type="radio" class="btn-check" name="cooling_system"
                                                    id="option0" autocomplete="off" value="2">
                                                <label class="btn btn-outline-success" for="option0">בחירה</label>



                                            </div>
                                        </div>
                                        <div class="card ml-3 mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text mt-2">מערכת קירור אוויר ושמן</p>
                                                <input type="radio" class="btn-check" name="cooling_system"
                                                    id="option1" autocomplete="off" value="0">
                                                <label class="btn btn-outline-danger" for="option1">בחירה</label>
                                            </div>

                                        </div>

                                        <div class="card" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text mt-2">מערכת קירור אוויר</p>
                                                <input type="radio" class="btn-check" name="cooling_system"
                                                    id="option2" autocomplete="off" value="1">
                                                <label class="btn btn-outline-info" for="option2">בחירה</label>
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
                                                <input type="radio" class="btn-check" name="car_pollution"
                                                    id="option14" autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option14">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card mr-3" style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">לא משנה</p>
                                                <input type="radio" class="btn-check" name="car_pollution"
                                                    id="option15" autocomplete="off" value="1">
                                                <label class="btn btn-outline-danger" for="option15">בחירה</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question8" role="tabpanel" aria-labelledby="question8-tab">
                                    <h5 class="card-title mt-3">? מחיר</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card ml-3 mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold">

                                                <p class="card-text">עד 10</p>
                                                <input type="radio" class="btn-check" name="price" id="option17"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option17">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold  ">

                                                <p class="card-text">עד 30</p>
                                                <input type="radio" class="btn-check" name="price" id="option18"
                                                    autocomplete="off" value="1">
                                                <label class="btn btn-outline-danger" for="option18">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card " style="width: 18rem;">

                                            <div class="card-body fw-bold">

                                                <p class="card-text">30+</p>
                                                <input type="radio" class="btn-check" name="price" id="option19"
                                                    autocomplete="off" value="0">
                                                <label class="btn btn-outline-info" for="option19">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="question9" role="tabpanel" aria-labelledby="question9-tab">
                                    <h5 class="card-title mt-3">קיבולת דלק</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="card d-flex justify-content-center  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold">

                                                <p class="card-text ">לא משנה לי</p>
                                                <input type="radio" class="btn-check" name="fuel_captacity"
                                                    id="option20" autocomplete="off" value="0">
                                                <label class="btn btn-outline-success" for="option20">בחירה</label>
                                            </div>
                                        </div>
                                        <div class="card d-flex justify-content-center  mr-3" style="width: 18rem;">

                                            <div class="card-body  fw-bold">

                                                <p class="card-text">כמה שיותר</p>
                                                <input type="radio" class="btn-check" name="fuel_captacity"
                                                    id="option21" autocomplete="off" value="1">
                                                <label class="btn btn-outline-danger" for="option21">בחירה</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="text-center mt-4">
                                <button type="button" id="changetabbutton" class="btn btn-primary ">לשלב הבא</button>
                            </div> --}}
                        </div>

                    </div>
                    <div class="text-center mt-5">
                        <button type="button" type="submit" class="btn btn-primary"> סיום ומעבר לקבלת התשובות</button>
                    </div>
                    <div class="text-center mt-3">
                        <a type="button" class="btn btn-warning" href="{{ route('home') }}">לשאלות הרכבים</a>
                        <a type="button" class="btn btn-danger" href="{{ url('/search/bike') }}">לחיפוש אופנועים לבד </a>

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
