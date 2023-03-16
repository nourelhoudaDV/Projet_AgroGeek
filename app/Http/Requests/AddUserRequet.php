<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddUserRequet extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'country_id' => 'nullable|exists:countries,' . Country::PK,
            'gender' => 'required|string|max:2|' . Rule::in(['W', 'M']),
            'avatar' => $this->image('avatar') . 'image|mimes:jpeg,png,jpg|max:2048'
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
