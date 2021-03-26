<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'     => 'required',
            'adress'     => 'required',
            'description'=> 'required',            
            'available'=> 'required',    
            'store_url'  => 'required',
            // 'image'     => 'required|file|image',
            
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => '名前を入れて！',
            'adress.required'        => '住所を入れて！',
            'description.required'   => '説明を入れて１',            
            'available.required'        => '空き状況を入れて！',
            'store_url.required'     => 'URLを入れて！', 
            // 'image.required'        => '画像を入れて！',                       
        ];
    }
}
