<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'date',  'before:today'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pacientes'],
            'cpf' => ['required', 'string', 'max:255', 'unique:pacientes'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data.',
            'data_nascimento.before' => 'O campo data de nascimento deve ser uma data anterior a hoje.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email deve ser um email válido.',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres.',
            'cpf.required' => 'O campo cpf é obrigatório.',
            'cpf.string' => 'O campo cpf deve ser uma string.',
            'cpf.max' => 'O campo cpf deve ter no máximo 255 caracteres.',
            'cpf.unique' => 'O cpf informado já está em uso.',
        ];
    }
}
