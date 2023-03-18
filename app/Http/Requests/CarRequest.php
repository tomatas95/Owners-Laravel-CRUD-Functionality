<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'reg_number.required' => __("Register Number is required"),
            'model.required' => __("Model is required."),
            'carname.required' =>__("Brand Field is required."),
            'owner_id.required' => __("Selecting Car's Owner is required."),
            'reg_number.regex' => __("The registration number must be in the format of three letters followed by three numbers."),
            'carname.max' => __("The brand name must not be greater than :max characters."),
            'carname.min' => __("The brand name must be at least :min characters."),
            'carname.regex' => __("The brand name must only contain alphabetical characters."),
            'model.min' => __("The model must be at least :min characters."),
            'model.max' => __("The model must not be greater than :max characters."),
            'reg_number.max' => __("Register Number must not be greater than :max characters."),
            'reg_number.min' => __("Register Number must be at least :min characters."),
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
            'reg_number' => 'required|min:6|max:10|regex:/^[a-zA-Z]{3}[0-9]{3}$/',
            'model' => 'required|min:3|max:20',
            'carname' => 'required|min:3|max:20|regex:/^[a-zA-Z\s]+$/',
            'owner_id' => 'required',
        ];
    }
}
