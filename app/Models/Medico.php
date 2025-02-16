<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\MedicoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'crm',
        'especialidade',
    ];

    /**
     * Get all of the atendimentos for the Medico
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

    /**
     * The pacientes that belong to the Medico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'atendimentos');
    }
}
