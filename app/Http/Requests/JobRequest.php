<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'job' => 'required',
            'competences.*.competence' => 'required',
            'competences.*.height' => 'required|numeric|between:0,100',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $sum = collect($this->input('competences') ?? [])->sum('height');
            if ($sum != 100) {
                $validator->errors()->add('competences_sum', 'Total sum of weights must be 100. Current value is: ' . $sum);
            }
        });
    }
}
