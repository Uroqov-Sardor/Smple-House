<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // home
            'title'=>'required',
            'title_en'=>'required',
            'title_ru'=>'required',
            'title_uz'=>'required',
            'paragraph'=>'required',
            'paragraph_en'=>'required',
            'paragraph_ru'=>'required',
            'paragraph_uz'=>'required',
            'cardImg'=>'required',
            'cardTitle'=>'required',
            'cardTitle_en'=>'required',
            'cardTitle_ru'=>'required',
            'cardTitle_uz'=>'required',
            'cardText'=>'required',
            'cardText_en'=>'required',
            'cardText_ru'=>'required',
            'cardText_uz'=>'required'
        ];
    }
}
