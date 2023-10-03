<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
            return [
                'title' => 'required|string',
                'content' => 'required|string',
                'slug' => 'nullable|string|unique:companies|max:100',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => 'required|string|unique:companies,email',
                'site' => 'required|string',
                'phone' => 'required|integer',
            ];
    }
}
