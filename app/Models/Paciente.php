<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email',
    ];

    /**
     * Get all of the atendimentos for the Paciente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

    /**
     * The medicos that belong to the Paciente
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'atendimentos');
    }
}
