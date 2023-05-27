<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeMaterielRequest extends FormRequest
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
          
            'description' => 'nullable|string|max:225',
            'titre' => 'required|string|max:150',
            'logo' => $this->image('logo') . 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    /***
     * Validate image required
     * @param $name
     * @return string
     */
    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
