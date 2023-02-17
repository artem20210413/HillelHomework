<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     *
     *
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
            'name' => 'required|unique:category,name|max:100|min:3'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле імені є обов’язковим для заповнення.',
            'name.unique' => 'Назва вже зайнята.',
            'name.min' => 'Назва повинно містити не менше 3 символів.',
            'name.max' => 'Назва не повинна перевищувати 100 символів.',



        ];
    }
}
