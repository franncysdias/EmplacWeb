<?php

namespace LaraDev;

use DateTime;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use LaraDev\Support\Cropper;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'genre',
        'document',
        'document_secondary',
        'document_secondary_complement',
        'date_of_birth',
        'cover',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'cell',
        'telephone',
        'admin',
        'client',
        'seller'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'users_companies', 'user', 'company');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'user', 'id');
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = $this->clearField($value);
    }

    public function getUrlCoverAttribute()
    {
        if(!empty($this->cover)){
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }

        return '';
    }

    public function getDocumentAttribute($value)
    {
        return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, 9, 2);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->upperField($value);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $this->convertStringToDate($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setRealtoDolarAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function getRealtoDolarAttribute($value)
    {
        $this->attributes['real_to_dolar'] = floatval($this->convertStringToDouble($value));
    }

    public function setDateAttribute($value)
    {
        $this->attributes['password'] = $this->convertStringToDate($value);
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = $this->clearField($value);
    }

    public function setTelephoneAttribute($value)
    {
        if($value != null){
            $this->attributes['telephone'] = $this->clearField($value);
        }
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = $this->clearField($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setAdminAttribute($value)
    {
        $this->attributes['admin'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setClientAttribute($value)
    {
        $this->attributes['client'] =  ($value === true || $value === 'on' ? 1 : 0);
    }

    /**
     * Limpar caracteres.
     *
     * @var array
     */
    private function clearField(string $param)
    {
        if(empty($param)){
            return '';
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
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
        $value = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$param);
        return strtoupper($value);
    }

    /**
     * Colocar texto em caixa alta.
     *
     * @var array
     */
    private function convertStringToDate(string $param)
    {
        if(empty($param)){
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

    /**
     * Converte de Real para Dolar.
     *
     * @var array
     */
    private function convertStringToDouble(string $param)
    {
        if(empty($param)){
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }
}
