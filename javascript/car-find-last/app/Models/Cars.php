<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;


    protected $fillable = [
        'brand',
        'car_name',
        'liter_baggage',
        'car_pollution',
        '4on4',
        'crusie_control',
        'reverse_camera',
        'autonomous_braking',
        'type_of_car',
        'price',
        'model_of_car',
        'picture_1',
        'picture_2',
    ];
}
