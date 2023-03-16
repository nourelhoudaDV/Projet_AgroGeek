<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Add extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

//        dd(
//          $this->all()
//        );



        return   [
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'gender' => 'required|string|' . Rule::in(['W', 'M']),
            'avatar' =>  $this->request->get('avatar-preview') !== null ? 'nullable' :  'required' . '|image|mimes:jpeg,png,jpg|max:2048',
            'logo' =>  $this->request->get('logo-preview') !== null ? 'nullable' :  'required' . '|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
