<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bike extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $fillable = [
        'brand',
        'bike_name',
        'cylinders',
        'starter',
        'price',
        'transmission_type',
        'engine_type',
        'fuel_captacity',
        'engine_stroke',
        'model_of_bike',
        'valves_per_cylinder',
        'cooling_system',
        'picture_1',
        'picture_2',
    ];
      public function setAvatarAttribute($value) 
      {
        $file = Storage::disk('local')->put('bikes/', $value);
        $this->attributes['picture_1'] = $file;
    }
}
