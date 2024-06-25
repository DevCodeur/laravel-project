<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[A-Za-z\s\-]+$/|string',
            'title'=> 'required|regex:/^[A-Za-z\s\-]+$/|string',
            'content'=> 'required|regex:/^[A-Za-z\s\-]+$/|string',
            'comment'=> 'nullable|regex:/^[A-Za-z\s\-]+$/|string|max:255',
            'price' => 'required|numeric',
            'qty'=> 'required|decimal:0,2',
            'avatar' => ['required', 'file', 'mimes:png, jpg'],
             
        ];
    }
}
