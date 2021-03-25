<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user',
        'company',
        'board',
        'renavam',
        'chassis',
        'brand',
        'model',
        'type',
        'year_manu',
        'year_model',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }

    public function brand()
    {
        return $this->hasOne(VehicleBrand::class, 'id', 'brand');
    }

    public function model()
    {
        return $this->hasOne(VehicleModel::class, 'id', 'model');
    }

    public function type()
    {
        return $this->hasOne(VehicleType::class, 'id', 'type');
    }

    public function setBoardAttribute($value)
    {
        $this->attributes['board'] = $this->upperField($value);
    }

    public function setChassisAttribute($value)
    {
        $this->attributes['chassis'] = $this->upperField($value);
    }

    public function upperField($param)
    {
        if(!empty($param)){
            return strtoupper($param);
        } else {
            return '';
        }
    }
}
