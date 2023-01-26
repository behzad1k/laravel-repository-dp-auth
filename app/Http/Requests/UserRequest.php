<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->check()){
            return auth()->user()->isAdmin();
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:2', 'max:30'
            ],
            'surname' => [
                'required', 'min:3', 'max:30'
            ],
            'email' => [
                'required', 'email:rfc,dns'
            ],
            'user_type_id' => [
                'required',
            ]
        ];
    }
}
