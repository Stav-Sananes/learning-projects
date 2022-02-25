<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cars extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $fillable = [
        'brand',
        'car_name',
        'liter_baggage',
        'car_pollution',
        'four_on_four',
        'crusie_control',
        'reverse_camera',
        'number_of_seats',
        'autonomous_braking',
        'type_of_car',
        'price',
        'model_of_car',
        'picture_1',
        'picture_2',
    ];
    
    public function setAvatarAttribute($value) {
        $file = Storage::disk('local')->put('cars/', $value);
        $this->attributes['picture_1'] = $file;
    }
    /* public function responseAvatar() {
        ob_get_clean();
        return $this->avatar && Storage::disk('local')->exists($this->avatar) ? Storage::disk('local')->response($this->avatar) : abort(404);
    } */
  
 
    
}
