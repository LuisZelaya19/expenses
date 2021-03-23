<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
            'amount' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'entry_date' => [
                'required'
            ],
            'expense_category_id' => [
                'required'
            ],
            'description' => []
        ];
    }

    public function messages()
    {
        return [
            'expense_category_id.required' =>  'tipo de gasto es obligatorio',
            'amount.required' => 'el monto es obligatorio',
            'amount.numeric' => 'el monto debe ser un valor numerico',
            'amount.regex' => 'el monto debe contener una parte entera y/o una decimal con maximo 2 decimales',
            'entry_date.required' => 'la fecha del gasto es obligatoria'
        ];
    }
}
