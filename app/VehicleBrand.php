<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleBrand extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    public function brand()
    {
        return $this->belongsTo(Vehicle::class, 'id', 'id');
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
