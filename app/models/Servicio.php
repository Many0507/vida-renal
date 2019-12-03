<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'vr_servicios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'imagen'
    ];

    public $timestamps = true;

    public function __construct()
    {
        return new Connect;
    }
}
