<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|max:100',
            'expire' => 'required|date|after_or_equal:today'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'ファイル名',
            'expire' => '期限日',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'expire.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
