<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'social_name',
        'alias_name',
        'document_company',
        'document_company_secondary',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'email',
        'password'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_companies','company', 'user');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicles', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'company', 'id');
    }

    public function setSocialNameAttribute($value)
    {
        $this->attributes['social_name'] = $this->upperField($value);
    }

    public function setDocumentCompanyAttribute($value)
    {
        $this->attributes['document_company'] = $this->clearField($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getDocumentCompanyAttribute($value)//03.076.986/0001-71
    {
        return substr($value, 0,2) . '.' . substr($value, 2, 3) . '.' . substr($value, 5, 3) . '/' . substr($value, 8, 4) . '-' . substr($value, 12, 2);
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
