<?php

namespace LaraDev\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Vehicle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function all($keys = null)
    {
        return $this->validateFields(parent::all());
    }

    public function validateFields(array $inputs)
    {
        //Corrigir logica de programção 21/03/2021 22:56
        if(!empty($inputs['board'])){
            $inputs['board'] = str_replace(['.','-'],'',$this->request->all()['board']);
        } else {
            array_splice($inputs, 3, 1);
        }
        if(strlen($this->request->all()['property'] > 10000000000)){
            $inputs['company'] = $this->request->all()['property'] - 10000000000;
        } else {
            $inputs['user'] = $this->request->all()['property'];
        }
        return $inputs;
    }
    /**
     * Get the validation rules that apply to the request.'required|min:17'
     *
     * @return array
     */
    public function rules()
    {
        return [
            'property' => 'required',
            'chassis' => (!empty($this->request->all()['id']) ? 'required|min:17|unique:vehicles,chassis,' . $this->request->all()['id'] : 'required|min:17|unique:vehicles,chassis'),
            'board' => (!empty($this->request->all()['id']) ? 'nullable|min:7|unique:vehicles,board,' . $this->request->all()['id'] : 'nullable|min:7|unique:vehicles,board'),
            'renavam' => 'numeric|required',
            'year_manu' => 'required|min:4',
            'year_model' => 'required|min:4',
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required'
        ];
    }
}
