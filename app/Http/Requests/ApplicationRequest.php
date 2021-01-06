<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ];
    }

    /**
     * @return array|string[]
     */

    public function messages()
    {
        return [
            'name.required' => 'Введите ваше имя!',
            'email.required' => 'Введите ваш email!',
            'email.email' => 'Email должен быть в формате user@example.com.',
            'phone.required' => 'Введите ваш телефон!',
            'phone.regex' => 'Не верный формат!',
            'phone.min' => 'Номер должен состоять минимум из 10-ти символов!'
        ];
    }
}
