<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Models\Status;
use Illuminate\Validation\Rule;

class EditTaskRequest extends CreateTaskRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        return $rules + [
            'status_id' => 'required|' . Rule::in(Status::pluck('id')),
        ];
    }

    /**
     * 
     */
    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status_id' => '状態',
        ];
    }

    /**
     * 
     */
    public function messages()
    {
        $messages = parent::messages();

        $statusArray = Status::pluck('name')->toArray();
        $statusStr = implode('、', $statusArray);

        return $messages + [
            'status_id.in' => ':attribute には ' . $statusStr. ' のいずれかを指定してください。'
        ];
    }
}
