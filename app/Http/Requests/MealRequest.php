<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'meal_id' => 'required|exists:meals,id',    // Ensures a valid Meal ID is provided
            'quantity' => '',     // Quantity must be an integer and at least 1
            'name' => 'required|string|max:255',
            'price'=> '',
            'weight'=> '',
            'people_count'=>''
        ];
    }
}
