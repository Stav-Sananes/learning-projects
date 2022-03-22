@extends('layouts.app')

@section('content')
    <div class="row" style="margin:3%">
        <div class="d-flex justify-content-center mb-3">
            <a type="button" class="btn btn-outline-info" href="{{ route('home') }}">לשאלות הרכבים</a>
        </div>
        @foreach ($cars as $car)
            <div class="col-sm-4">

                <div class="card">
                    <div class="card-body">
                        
                      <div>
                        <div class="mb-3 row">
                          <div class="col-sm-9">
                            <h5 class="card-text text-center">{{ $car->car_name }}</h5>
                          </div>
                          <label class="col-sm-3 col-form-label font-weight-bold" >שם  רכב</label>
                        </div>

                      </div>
                     
                        <div>
                          <div class="mb-3 row">
                            <div class="col-sm-9">
                              <p class="card-text text-center">{{ $car->brand }}</p>
                            </div>
                            <label class="col-sm-3 col-form-label font-weight-bold">שם חברת רכב</label>
                          </div>

                        </div>
                        <div>
                           
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->liter_baggage }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold" >ליטר בגאז</label>
                              </div>
    
                            </div>

                        </div>
                        <div>
                          <div>
                            <div class="mb-3 row">
                              <div class="col-sm-9">
                                <p class="card-text text-center">{{ $car->four_on_four ? 'כן': 'ללא'}}</p>
                              </div>
                              <label class="col-sm-3 col-form-label font-weight-bold">4X4</label>
                            </div>
  
                          </div>

                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->cruise_control ? 'כן': 'ללא'}}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">בקרת שיוט</label>
                              </div>
    
                            </div>
                        </div>
                        <div>


                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->number_of_seats }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מספר מקומות</label>
                              </div>
    
                            </div>
                        </div>
                        <div>

                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->type_of_car }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">סוג רכב</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->autonomous_braking ? 'כן' : 'ללא' }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מערכת בלימה אוטונומית</label>
                              </div>
    
                            </div>

                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->car_pollution  }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">דרגת זיהום רכב</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->price  }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מחיר</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->reverse_camera ? 'כן': 'לא' }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">בעל מצלמת רוורס</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $car->model_of_car }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מודל רכב</label>
                              </div>
    
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        @endforeach


    </div>
@endsection
