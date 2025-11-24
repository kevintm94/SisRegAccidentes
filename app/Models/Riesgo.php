<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Riesgo extends Model
{
    use HasFactory;
    protected $table = 'riesgos';

    protected $fillable = [
        'nombre',
        'nivel',
        'descripcion'
    ];

    public function incidentes() : HasMany {
        return $this->hasMany(Incidente::class);
    }
}
