<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    /** @use HasFactory<\Database\Factories\AtendimentoFactory> */
    use HasFactory;

    protected $fillable = [
        'data_atendimento',
        'medico_id',
        'paciente_id',
    ];

    /**
     * Get the medico that owns the Atendimento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    /**
     * Get the paciente that owns the Atendimento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
