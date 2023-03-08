<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Car extends Model
{
    protected $fillable = [
        'reg_number',
        'model',
        'carname',
        'owner_id',
    ];

    use HasFactory;

    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id');
    }

    public function scopeFilter(Builder $query, $filterCars){
        if(isset($filterCars->reg_number)){
            $query->where('reg_number', 'like', "%$filterCars->reg_number%");
        }
    
        if(isset($filterCars->model)){
            $query->where('model', 'like', "%$filterCars->model%");
        }
    
        if(isset($filterCars->brand)){
            $query->where('carname', 'like', "%$filterCars->brand%");
        }
    
        if(isset($filterCars->owner_id)){
            if ($filterCars->owner_id == 'all') {
                return $query;
            } else {
                $query->where('owner_id', $filterCars->owner_id);
            }
        }
    }
    
}
