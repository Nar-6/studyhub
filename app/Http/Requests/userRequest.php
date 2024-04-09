<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            //
            'nom'=> 'required|min: 3',
            'email'=> 'required|email|unique:users',
            'password'=>'required',
            'role'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire ',
            'nom.min' => 'Votre nom doit contenir au moins trois caracteres',
            'email.required' => "L'email est obligatoire ",
            'email.email'=> "Ceci n'est pas le format d'un email ",
            'email.unique'=> "Cet email est deja pris",
            'password.required'=>'Le mot de passe est obligatoire',
            'role.required'=>'Le role est obligatoire',
        ];
    }

}
