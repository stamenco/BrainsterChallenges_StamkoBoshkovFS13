<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'home_team_id' => 'required',
            'guest_team_id' => 'required',
            'date' => 'required',
            'host_score' => 'nullable|numeric',
            'guest_score' => 'nullable|numeric',
        ];
    }
}
