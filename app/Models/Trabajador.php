<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trabajador extends Model
{
    use HasFactory;
    protected $table = 'trabajadores';

    protected $fillable = [
        'obra_id',
        'nombre',
        'cargo',
        'nivel_riesgo'
    ];

    public function obra() : BelongsTo {
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    public function incidentes() : HasMany {
        return $this->hasMany(Incidente::class);
    }
}
