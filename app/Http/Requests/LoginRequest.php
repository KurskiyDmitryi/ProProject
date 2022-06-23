<?php

namespace App\Http\Requests;

use App\Rules\PasswordLettersRule;
use App\Rules\PasswordMixedCaseRule;
use App\Rules\PasswordNumbersRule;
use App\Rules\PasswordSymbolsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */

    public function rules()
    {

        return [
            'name' => ['required', 'min:5', 'max:25'],
            'email' => ['email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:4', 'max:15', new PasswordMixedCaseRule(), new PasswordSymbolsRule(), new PasswordNumbersRule(), new PasswordLettersRule()]

        ];

    }

    function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно к заполнению.',
            'email' => 'Поле :attribute должно быть зполнено в соответствии с правилами.',
            'min' => 'Поле :attribute должно иметь не меньше :min символов.',
            'max' => 'Поле :attribute должно иметь не больше :max символов.',
            'confirmed' => 'Подвердите пароль повторным вводом.',
        ];
    }

}

