<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return[
            'name' => __("Name is required."),
            'surname.required' => __("Surname is required."),
            'years.required' =>__("Years is required."),
            'name.min' => __("The name must be at least :min characters."),
            'name.max' => __("The name must not be greater than :max characters."),
            'surname.min' => __("The surname must be at least :min characters."),
            'surname.max' => __("The surname must not be greater than :max characters."),
            'years.integer' => __("Years field must be an integer."),
            'years.min' => __("The Years field must be at least :min old."),
            'years.max' => __("The Years field must not be greater than :max"),
            'name.regex' => __("Name must contain only alphabetic characters."),
            'surname.regex' => __("Surname must contain only alphabetic characters.")

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required|min:3|max:32|regex:/^[a-zA-Z\s]+$/',
        'surname' => 'required|min:3|max:30|regex:/^[a-zA-Z\s]+$/',
        'years' => 'required|integer|min:1|max:140'
        ];
    }
}
