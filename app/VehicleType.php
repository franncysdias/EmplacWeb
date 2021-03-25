<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    public function type()
    {
        return $this->belongsTo(VehicleType::class, 'id', 'id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->upperField($value);
    }

    /**
     * Colocar texto em caixa alta.
     *
     * @var array
     */
    private function upperField(string $param)
    {
        if(empty($param)){
            return '';
        }

        return strtoupper($param);
    }
}
