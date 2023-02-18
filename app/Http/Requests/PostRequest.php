<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PostRequest
 * @package App\Http\Requests
 * @property integer $id
 * @property integer category_id
 * @property string header
 * @property string comment
 * @property array tags
 */

class PostRequest extends FormRequest
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
            'category_id' => 'required|exists:category,id',
            'header' => 'required|max:100|min:3',
            'comment' => 'required|max:600|min:10',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Поле ідентифікатор категорії є обов’язковим для заповнення.',
            'category_id.exists' => 'Вибраний ідентифікатор категорії недійсний.',
            'header.required' => 'Поле заголовок є обов’язковим для заповнення.',
            'header.min' => 'Заголовок повинен містити не менше 3 символів.',
            'header.max' => 'Заголовок не повинен перевищувати 100 символів.',
            'comment.required' => 'Поле коментар є обов’язковим для заповнення.',
            'comment.min' => 'Коментар повинен містити не менше 3 символів.',
            'comment.max' => 'Коментар не повинен перевищувати 600 символів.',
        ];
    }
}
