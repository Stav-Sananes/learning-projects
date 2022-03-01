@extends('layouts.app')
@section('content')
    @if (\Auth::User()->is_admin)
        <form class="needs-validation" action="{{ route('bikes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="  card-body text-center">
                <div class="form-row ">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">שם חברת האופנוע?</label>
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
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">שם האופנוע</label>
                        <input type="text" class="form-control" id="validationCustom02" name="bike_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">סוג הפצה באופנוע</label>
                        <input type="number" class="form-control" id="validationCustom02" name="transmission_type"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">סוג מנוע</label>
                        <select class="form-control text-center" name="engine_type" id="engine_type">
                            <option value="Inline Engines">Inline Engines</option>
                            <option value="Single Cylinder">Single Cylinder</option>
                            <option value="Parallel Twin">Parallel Twin</option>
                            <option value="Inline Triple and Four">Inline Triple and Four</option>
                            <option value="V Engines">V Engines</option>
                            <option value="V Twin">V Twin</option>
                            <option value="V Four">V Four</option>
                            <option value="Flat Engines">Flat Engines</option>
                            <option value="Flat 2">Flat 2</option>
                            <option value="Flat 4">Flat 4</option>
                            
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">קיבולת דלק</label>
                        <input type="number" class="form-control" id="validationCustom02" name="fuel_captacity" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מודל האופנוע</label>
                        <select class="form-control text-center" name="model_of_bike" id="model_of_bike">
                            <option value="Sport">Sport</option>
                            <option value="Cruiser">Cruiser</option>
                            <option value="Touring">Touring</option>
                            <option value="Off-Road">Off-Road</option>
                            <option value="Scooter">Scooter</option>
                            <option value="Track">Track</option>
                            <option value="Standard">Standard</option>
                            <option value="Electric">Electric</option>
                            <option value="Sport-Touring">Sport-Touring</option>
                            <option value="On-Off-Road">On-Off-Road</option>
                            <option value="Youth">Youth</option>
                            <option value="Touring-Scooter">Touring-Scooter</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">שסתומים בצלינדר</label>
                        <input type="number" class="form-control" id="validationCustom02" name="valves_per_cylinder"
                            required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מערכת קירור</label>

                        <select class="form-control text-center" name="cooling_system" id="cooling_system">
                            <option value="0">מערכת קירור אוויר ושמן </option>
                            <option value="1">מערכת קירור אוויר</option>
                            <option value="2">מערכת נוזלים</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מהלך מנוע</label>

                        <input type="number" class="form-control" id="validationCustom02" name="engine_stroke" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">צילנדרים</label>
                        <input type="number" class="form-control" id="validationCustom02" name="cylinders" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">מחיר</label>
                        <input type="number" class="form-control" id="validationCustom02" name="price" required>
                    </div>
                    <div class="form-group col-md-4 mb-3 ">
                        <label for="validationCustom02">סוג הנעה</label>

                        <select class="form-control text-center" name="starter" id="starter">
                            <option value="0">רגילה</option>
                            
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
