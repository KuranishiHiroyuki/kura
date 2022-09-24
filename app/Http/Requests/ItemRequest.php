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
        $validate = [];

        $validate += [
            'name' =>[
                'required'
            ],
            'category_id' =>[
                'required'
            ],
            'price' => [
                'required',
            'numeric'
            ],
            'detail' => [
                'required'
            ],
        ];
        return $validate;
    }
}
