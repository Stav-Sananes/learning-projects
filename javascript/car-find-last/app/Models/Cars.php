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
    public function getAvatarUrlAttribute()
    {
        return $this->avatar && Storage::disk('local')->exists($this->avatar) ? route('avatar-customer', ['id' => $this->id])/*Storage::url($this->avatar)*/ : null;
    }
    /* public function responseAvatar() {
        ob_get_clean();
        return $this->avatar && Storage::disk('local')->exists($this->avatar) ? Storage::disk('local')->response($this->avatar) : abort(404);
    } */

    
}
