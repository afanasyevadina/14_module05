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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'competences' => 'sometimes|array',
            'job_id' => 'required|exists:jobs,id',
            'competences.*.competence_id' => 'required|exists:competences,id',
            'competences.*.level_id' => 'required|exists:levels,id',
        ];
    }
}
