<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    public function model()
    {
        return $this->belongsTo(VehicleModel::class, 'id', 'id');
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
