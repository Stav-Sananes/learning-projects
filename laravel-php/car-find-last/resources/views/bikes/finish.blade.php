@extends('layouts.app')

@section('content')
    <div class="row" style="margin:2%">

        @foreach ($findBikes as $findBike)
            <div class="col-sm-4">

                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="mb-3 row">
                                <div class="col-sm-9">
                                    <h5 class="card-text text-center">{{ $findBike->picture_1 }}</h5>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">תמונת אופנוע</label>
                            </div>

                        </div>
                        <div>
                            <div class="mb-3 row">
                                <div class="col-sm-9">
                                    <h5 class="card-text text-center">{{ $findBike->model_of_bike }}</h5>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מודל אופנוע</label>
                            </div>

                        </div>

                        <div>
                            <div class="mb-3 row">
                                <div class="col-sm-9">
                                    <p class="card-text text-center">{{ $findBike->engine_type }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">סוג מנוע</label>
                            </div>

                        </div>
                        <div>

                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->cylinders }}</p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">מספר צילנדרים</label>
                                </div>

                            </div>

                        </div>
                        <div>
                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->starter }}</p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">סטרטר</label>
                                </div>

                            </div>

                        </div>
                        <div>
                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->transmission_type  }}
                                        </p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">סוג תמסורת</label>
                                </div>

                            </div>
                        </div>
                        <div>


                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->fuel_captacity }}</p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">כמות דלק באופנוע</label>
                                </div>

                            </div>
                        </div>
                        <div>

                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->engine_stroke }}</p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">מהלך מנוע</label>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->cooling_system  }}
                                        </p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">מערכת קירור</label>
                                </div>

                            </div>

                        </div>
                        <div>
                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->brand }}</p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">חברת אופנוע</label>
                                </div>

                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9">
                                        <p class="card-text text-center">{{ $findBike->price }},000₪</p>
                                    </div>
                                    <label class="col-sm-3 col-form-label font-weight-bold">מחיר</label>
                                </div>

                            </div>
                        </div>
                      



                    </div>
                </div>

            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-2 mb-2">
            <a type="button" class="btn btn-outline-info" href="{{ route('bikes') }}">לשאלות האופנועים</a>
        </div>

    </div>
@endsection
