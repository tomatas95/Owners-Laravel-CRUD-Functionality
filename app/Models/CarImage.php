<?php

namespace App\Models;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarImage extends Model
{

    protected $table = 'car_images';

    protected $fillable = ['filename', 'car_id'];

    use HasFactory;

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
