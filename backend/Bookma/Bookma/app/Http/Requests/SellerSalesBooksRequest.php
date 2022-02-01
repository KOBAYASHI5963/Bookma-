<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerSalesBooksRequest extends FormRequest
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
            'category_id' => 'required',
            'product_condition' => 'required',
            'shipping_method_id' => 'required',
            'title' => 'required|max:40',
            'content' => 'required|max:1000',
            'shipping_bearer' => 'required',
            'shipping_area' => 'required',
            'delivery_days' => 'required',
            'price' => 'required|integer|min:300|max:9999999',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーを選択して下さい。',
            'product_condition.required' => '商品の状態を選択して下さい。',
            'shipping_method_id.required' => '商品の発送方法を選択して下さい。',
            'title.required' => '商品名を入力して下さい。',
            'title.max' => '商品名は40字以内でお願いします。',
            'content.required' => '商品説明を記載して下さい。',
            'content.max' => '商品名は1000字以内でお願いします。',
            'shipping_bearer.required' => '配送料負担者を選択して下さい。',
            'shipping_area.required' => '発送場所を選択して下さい。',
            'delivery_days.required' => '発送日数を選択して下さい。',
            'price.required' => '本の値段を入力して下さい。',
            'price.integer' => '本の値段は数字半角でお願いします。',
            'price.min' => '本の値段は300円以上でお願いします。',
            'price.max' => '本の値段は9,999,999円以下でお願いします。',
        ];
    }


}
