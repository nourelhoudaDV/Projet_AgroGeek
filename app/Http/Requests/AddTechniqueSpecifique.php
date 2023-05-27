<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTechniqueSpecifique extends FormRequest
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
        return [
          
            'titre' => 'string|max:150',
            'idTechFK' => 'nullable|string|max:150',
            'description' => 'string|max:150',
            'logo' =>   $this->image('logo') . 'image|mimes:jpeg,png,jpg|max:2048'

        ];
    }
    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
