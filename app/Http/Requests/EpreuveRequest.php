<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpreuveRequest extends FormRequest
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
            'nomEp' =>['required'],
            'dateEp' =>['required'],
            'heurDeb' =>['required'],
            'heurFin' =>['required'],
            'numProf' =>['required'],
            'codFil' =>['required'],
            'codMat' =>['required'],
        ];
    }
}
