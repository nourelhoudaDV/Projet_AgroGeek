<?php

namespace App\Http\Requests\TypeMateriel;

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
    return [
        'nom' => 'required|string|max:150',
        'description' => 'nullable|string',
        'techniqueA' => 'required|exists:technique_agricoles,',
    ];
}

}
