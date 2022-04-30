<?php

    namespace App\Http\Requests\Bands;

    use Illuminate\Foundation\Http\FormRequest;

    class BandRequest extends FormRequest
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
                'name' => ['required', 'max:255', 'unique:bands,name'],// . $this->route('band')->id
                'country_id' => ['required', 'exists:countries,id'],
                'genres' => ['required', 'array', 'exists:genres,id'],
                'city' => ['max:255'],
            ];
        }
    }
