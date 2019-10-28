<?php
namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model {
    protected $table = 'vr_actividades';

    public function __construct () {
        return new Connect;
    }
}
