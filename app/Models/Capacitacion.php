<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Capacitacion extends Model
{
    use HasFactory;
    protected $table = 'capacitaciones';

    protected $fillable = [
        'reporte_id',
        'tema',
        'descripcion',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function incidente() : BelongsTo {
        return $this->belongsTo(Incidente::class, 'reporte_id');
    }
}
