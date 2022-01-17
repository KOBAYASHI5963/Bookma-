<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferAccountSettingRequest extends FormRequest
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
            'bank_name' => 'required|max:20',
            'bank_code' => 'required|regex:/^[a-z0-9]{4}$/',
            'branch_name' => 'required|max:20',
            'branch_code' => 'required|regex:/^[a-z0-9]{3}$/',
            'deposit_type' => 'required',
            'account_number' => 'required|regex:/^[a-z0-9]{7}$/',
            'account_name' => 'required|max:20|regex:/\A[ァ-ヴー]+\z/u',
        ];
    }


    public function messages()
    {
        return [
            'bank_name.required' => '銀行名の入力は必須です。',
            'bank_name.max' => '銀行名は20字以内でお願いします。',
            'bank_code.required' => '銀行コードの入力は必須です。',
            'bank_code.regex' => '銀行コードは数字半角4桁でお願いします。',
            'branch_name.required' => '支店名の入力は必須です。',
            'branch_name.max' => '支店名は20字以内でお願いします。',
            'branch_code.required' => '支店コードの入力は必須です。',
            'branch_code.regex' => '支店コードは数字半角3桁でお願いします。',
            'deposit_type.required' => '預金種別を選択して下さい。',
            'account_number.required' => '口座番号の入力は必須です。',
            'account_number.regex' => '口座番号は数字半角7桁でお願いします。',
            'account_name.required' => '口座名義の入力は必須です。',
            'account_name.max' => '口座名義は20字以内でお願いします。',
            'account_name.regex' => '口座名義は全角カタカナでお願いします。',
        ];
    }
}