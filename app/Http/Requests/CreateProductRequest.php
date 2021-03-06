<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'price' => 'required',
            'category_id' => 'required',
            'avatar' => 'required|image|dimensions:min_width=300,min_height=300',
            'thumbnails' => 'required',
            'thumbnails.*' => 'image|dimensions:min_width=300,min_height=300',
        ];
    }
}
