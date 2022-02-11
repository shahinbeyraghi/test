<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertCommentRequest extends FormRequest
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
            'body' => ['required_without:vote'],
            'vote' => ['required_without:body', 'in:1,2,3,4,5']
        ];
    }
}
