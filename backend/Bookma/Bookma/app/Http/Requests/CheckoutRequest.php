<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'shipping_address_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'shipping_address_id.required' => 'お届け先を選択して下さい。決済ページに進むにはお届け先の住所登録が必須となります。 '
        ];
    }
}
