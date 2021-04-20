<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'title'     => 'required',
            'value'     => 'required|numeric',
            'item_url'  => 'required',
            'image'     => 'mimes:jpeg,jpg,png,gif|max:10240',
            'description'=> 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'タイトルを入れて！',
            'value.required'        => '数値を入れて！',
            'item_url.required'     => 'URLを入れて！',
            'image.mimes'        => 'jpeg,jpg,png,gifのどれかで！',
            'image.max'        => 'サイズを１０MB以下にして下さい',
            'description.required'   => '説明を入れて１',
        ];
    }
}
