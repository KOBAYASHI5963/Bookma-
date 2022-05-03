<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
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
            'name' => 'required|max:50',
            'post_code' => 'required|regex:/^[a-z0-9]{7}$/',
            'prefectures' => 'required',
            'city' => 'required',
            'street' => 'required',
            'phone_number' => 'required|regex:/^[0-9]+$/',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '氏名の入力は必須です。',
            'name.max' => '氏名は50字以内でお願いします。',
            'post_code.required' => '郵便番号の入力は必須です。',
            'post_code.regex' => '郵便番号は数字半角7桁でお願いします。',
            'prefectures.required' => '都道府県を選択して下さい。',
            'city.required' => '市区町村の入力は必須です。',
            'street.required' => '番地の入力は必須です。',
            'phone_number.required' => '電話番号の入力は必須です。',
            'phone_number.regex' => '電話番号は数字半角桁でお願いします。',
        ];
    }
}