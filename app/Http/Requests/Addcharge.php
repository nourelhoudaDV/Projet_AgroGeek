<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Addcharge extends FormRequest
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
        // dd(request());

        return [
          
            'titre' => 'required|string|max:150',
            'costUnit' => 'nullable|string|max:150',
            'idTechFK' => 'nullable|string|max:150',
            'description' => 'nullable|string|max:150',

        ];
    }
    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
