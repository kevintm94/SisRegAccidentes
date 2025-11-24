<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidente extends Model
{
    use HasFactory;
    protected $table = 'reportes_incidentes';

    protected $fillable = [
        'sensor_id',
        'trabajador_id',
        'riesgo_id',
        'obra_id',
        'descripcion',
        'fecha_reporte',
        'estado'
    ];

    protected $casts = [
        'fecha_reporte' => 'datetime'
    ];

    public function sensor() : BelongsTo {
        return $this->belongsTo(Sensor::class, 'sensor_id');
    }

    public function trabajador() : BelongsTo {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public function riesgo() : BelongsTo {
        return $this->belongsTo(Riesgo::class, 'riesgo_id');
    }

    public function obra() : BelongsTo {
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}
