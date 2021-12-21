<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserProfileRequest extends FormRequest
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
            'name' => 'required|max:20',
            'introduce' => 'max:1000',
            'profile_image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ニックネームの入力は必須です。',
            'name.max'  => 'ニックネームは20字以内でお願いします。',
            'introduce.max'  => '自己紹介文は1000文字以内で入力をお願いします。',
            'profile_image.image'  => '画像ファイル以外の登録はできません。',
        ];
    }
}
