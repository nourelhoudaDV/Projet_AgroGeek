<?php

namespace App\Http\Requests;

use App\Models\Espece;
use Illuminate\Foundation\Http\FormRequest;

class AddStade extends FormRequest
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
            'phaseFin' => 'required|string|max:150',
            'espece' => 'required|exists:especes,'.Espece::PK,
            'description' => 'nullable|string',
        ];
    }
}
