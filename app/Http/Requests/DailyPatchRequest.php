<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyPatchRequest extends FormRequest
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
            "temperature" => "min:1|max:3|",
            "humidity" => "int",
            "wind" => "string",
            "precipitation" => "int",
            "type" => "string",
            "city_id" => "int",
            "date" => "string"
        ];
    }
}
