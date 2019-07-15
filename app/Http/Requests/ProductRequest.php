<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
         'sltCate' => 'required',
         'txtName' => 'required',
         'txtPrice' => 'required',
         'fImages' => 'image',
        ];
    }
    public function messages(){
        return[
            'sltCate.required' => "Vui lòng chọn danh mục sản phẩm.",
            'txtName.required' => "Tên sản phẩm không được để trống.",
            'txtPrice.required' => "Giá sản phẩm không được để trống.",
            'fImages.required' => "Vui lòng chọn hình ảnh.",
            'fImages.image' => ' File được chọn không phải hình ảnh. Vui lòng chọn lại.',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
