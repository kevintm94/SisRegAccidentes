<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'sensores';

    protected $fillable = [
        'tipo',
        'descripcion'
    ];

    public function incidentes() : HasMany {
        return $this->hasMany(Incidente::class);
    }
}
