<?php

namespace App\Http\Requests\Bands;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'duration' => ['nullable', 'max:255', 'regex:/^(([0]?[0-9][0-9]|[0-9]):([0-9][0-9]))$/']
        ];
    }

    public function messages ()
    {
        return [
            'duration.regex' => 'Duration must have a valid format: MM:SS'
        ];
    }
}
