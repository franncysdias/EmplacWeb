<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'name',
        'telephone',
        'status',
        'company'
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company');
    }

    public function setTelephoneAttribute($value)
    {
        if($value != null){
            $this->attributes['telephone'] = $this->clearField($value);
        }
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->upperField($value);
    }

    public function getTelephoneAttribute($value)//(86)99410-7333 8632323973 (86)
    {
        if(strlen($value) < 11){
            return '(' . substr($value, 0,2) . ')' . substr($value, 2, 0) . ' '. substr($value, 2, 4) . '-' . substr($value, 6, 4);
        } else {
            return '(' . substr($value, 0,2) . ')' . substr($value, 2, 0) . ' '. substr($value, 2, 5) . '-' . substr($value, 7, 4);
        }
    }

    private function clearField(string $param)
    {
        if(empty($param)){
            return '';
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }

    private function upperField(string $param)
    {
        if(empty($param)){
            return '';
        }
        $value = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$param);

        return strtoupper($value);
    }
}
