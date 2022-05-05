<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => 'required',
                        'image' => 'required',
                        'speciality_id' => 'required',
                        'about' => 'required',

                    ];
                }
            case 'PATCH':
            case 'PUT':
                return [
                    'name' => 'required',
                    'image' => 'nullable',
                    'speciality_id' => 'required',
                    'about' => 'required',

                ];
        }
    }
}
