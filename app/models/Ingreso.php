<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'vr_ingresos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'tipo_donador',
        'cantidad',
        'especie',
        'especie_cantidad'
    ];

    public $timestamps = true;

    public function __construct()
    {
        return new Connect;
    }
}
