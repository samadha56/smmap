<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class MarksUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'lat' => 'nullable|array',
            'lat.*' => 'required|numeric',
            'lng' => 'nullable|array',
            'lng.*' => 'required|numeric',
            'description' => 'nullable|array',
            'description.*' => 'required|string',
        ];
    }
}
