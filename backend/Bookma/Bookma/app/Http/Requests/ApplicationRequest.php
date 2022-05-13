<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'amount_money' => 'min:1000',
        ];
    }

    public function messages()
    {
        return [
            'amount_money.min:1000' => '申請金額は1,000円以上でお願いします。',
        ];
    }
}