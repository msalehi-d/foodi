<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoodReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string','unique:foods,name'],
            'category' => ['required','exists:categories,id'],
            'description' => ['nullable','string','max:255'],
            'image' => ['nullable','image'],
            'regular_price' => ['required','numeric'],
            'stock' => ['required','numeric','min:0','max:100'],
            'preparation_time' => ['required','numeric','min:1','max:180'],
        ];
    }
}
