<?php

namespace App\UI\Users\Requests\v1\Auth;

use App\Shared\Abstracts\Request;

class RegisterRequest extends Request
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize(): bool
    {
        return true;
    }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules(): array
    {
        return [];
    }

   /**
    * Get custom messages for validator errors.
    *
    * @return array
    */
    public function messages(): array
    {
        return [];
    }
}
