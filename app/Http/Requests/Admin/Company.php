<?php

namespace LaraDev\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Company extends FormRequest
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
        $inputs['document_company'] = str_replace(['.','-','/'],'',$this->request->all()['document_company']);
        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'social_name' => 'required|min:5|max:191',
            'document_company' => (!empty($this->request->all()['id']) ? 'required|min:14|unique:companies,document_company,' . $this->request->all()['id'] : 'required|min:14|unique:companies,document_company'),

            //Address
            'zipcode' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'city' => 'required',

            //Access
            'email' => (!empty($this->request->all()['id']) ? 'nullable|email|unique:companies,email,' . $this->request->all()['id'] : 'nullable|email|unique:companies,email'),
        ];
    }
}
