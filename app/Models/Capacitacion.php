<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    public $table = 'capacitaciones';
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'places',
    ];
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
