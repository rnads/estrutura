<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name',
            'email',
            'status',
            'group_id'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
           'name'     => 'required|max:50',
           'email'    => 'required|unique:users|max:100',
           'status'   => 'required',
           'group_id' => 'required'
        ];

        if ($this->_method == 'PUT') {
            $rules['email'] = [
                'required',
                'max:100',
                Rule::unique('users', 'email')->ignore($this->route('usuario')),
            ];
        }

        return $rules;
    }

    // public function getValidatorInstance()
    // {
    //     if ($this->request->has('TELEFONE')) {
    //         $this->merge([
    //             'TELEFONE' => preg_replace('/\D/', '', $this->request->get('TELEFONE'))
    //         ]);
    //     }

    //     return parent::getValidatorInstance();
    // }
}
