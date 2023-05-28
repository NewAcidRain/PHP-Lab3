<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "temperature" => "required|min:1|max:3|",
            "humidity" => "required|int",
            "wind" => "required|string",
            "precipitation" => "required|int",
            "type" => "required",
            "city_id" => "required",
            "date" => "required"
        ];
    }
}
