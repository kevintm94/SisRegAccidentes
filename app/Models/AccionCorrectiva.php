<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccionCorrectiva extends Model
{
    use HasFactory;
    protected $table = 'acciones_correctivas';

    protected $fillable = [
        'reporte_id',
        'tipo_accion',
        'detalle',
        'responsable',
        'fecha_programada'
    ];

    protected $casts = [
        'fecha_programada' => 'datetime'
    ];

    public function incidente() : BelongsTo {
        return $this->belongsTo(Incidente::class, 'reporte_id');
    }
}
