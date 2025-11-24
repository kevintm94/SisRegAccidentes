<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obra extends Model
{
    use HasFactory;
    protected $table = 'obras';

    protected $fillable = [
        'nombre',
        'ubicacion',
        'estado'
    ];

    public function trabajadores() : HasMany {
        return $this->hasMany(Trabajador::class);
    }

    public function incidentes() : HasMany {
        return $this->hasMany(Incidente::class);
    }
}
