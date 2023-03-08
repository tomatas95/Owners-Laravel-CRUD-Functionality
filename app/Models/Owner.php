<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Owner extends Model
{
    protected $fillable = ['name', 'surname', 'years'];

    use HasFactory;

    public function cars(){
        return $this->hasMany(Car::class, 'owner_id');
    }

    public function scopeFilter(Builder $query, $filterData){
        if($filterData->name != null){
            $query->where('name', 'like', "%$filterData->name%");
        }
        if($filterData->surname != null){
            $query->where('surname', 'like', "%$filterData->surname%");
        }
    }
    
}
