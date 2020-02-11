<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Aliados extends Model
{
    protected $table = 'vr_aliados';

    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen'
    ];

    public $timestamps = true;

    public function __construct()
    {
        return new Connect;
    }
}
