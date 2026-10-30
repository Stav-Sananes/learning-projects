@extends('layouts.app')

@section('content')
    <div class="row" style="margin:2%">
       
        @foreach ($findCars as $findCar)
            <div class="col-sm-4">

                <div class="card">
                    <div class="card-body">
                      <div>
                        <div class="mb-3 row">
                          <div class="col-sm-9">
                            <img class="card-text text-center w-25" src="/storage/{{ $findCar->picture_1 }}">
                          </div>
                          <label class="col-sm-3 col-form-label font-weight-bold" >תמונת רכב</label>
                        </div>

                      </div>
                      <div>
                        <div class="mb-3 row">
                          <div class="col-sm-9">
                            <h5 class="card-text text-center">{{ $findCar->car_name }}</h5>
                          </div>
                          <label class="col-sm-3 col-form-label font-weight-bold" >שם  רכב</label>
                        </div>

                      </div>
                     
                        <div>
                          <div class="mb-3 row">
                            <div class="col-sm-9">
                              <p class="card-text text-center">{{ $findCar->brand }}</p>
                            </div>
                            <label class="col-sm-3 col-form-label font-weight-bold">שם חברת רכב</label>
                          </div>

                        </div>
                        <div>
                           
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->liter_baggage }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold" >ליטר בגאז</label>
                              </div>
    
                            </div>

                        </div>
                        <div>
                          <div>
                            <div class="mb-3 row">
                              <div class="col-sm-9">
                                <p class="card-text text-center">{{ $findCar->four_on_four ? 'כן': 'ללא'}}</p>
                              </div>
                              <label class="col-sm-3 col-form-label font-weight-bold">4X4</label>
                            </div>
  
                          </div>

                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->crusie_control ? 'כן': 'ללא'}}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">בקרת שיוט</label>
                              </div>
    
                            </div>
                        </div>
                        <div>


                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->number_of_seats }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מספר מקומות</label>
                              </div>
    
                            </div>
                        </div>
                        <div>

                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->type_of_car }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">סוג רכב</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->autonomous_braking ? 'כן' : 'ללא' }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מערכת בלימה אוטונומית</label>
                              </div>
    
                            </div>

                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->car_pollution  }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">דרגת זיהום רכב</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">₪ {{  number_format($findCar->price,2,'.',',')  }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מחיר</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->reverse_camera ? 'כן': 'לא' }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">בעל מצלמת רוורס</label>
                              </div>
    
                            </div>
                        </div>
                        <div>
                            <div>
                              <div class="mb-3 row">
                                <div class="col-sm-9">
                                  <p class="card-text text-center">{{ $findCar->model_of_car }}</p>
                                </div>
                                <label class="col-sm-3 col-form-label font-weight-bold">מודל רכב</label>
                              </div>
    
                            </div>

                        </div>


                    </div>
                </div>

            </div>
            
        @endforeach
        <div class="d-flex justify-content-center mt-2 mb-2">
          <a type="button" class="btn btn-outline-info" href="{{ route('home') }}">לשאלות הרכבים</a>
      </div>

    </div>
@endsection
