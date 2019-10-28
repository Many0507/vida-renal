<?php 
namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model {
    protected $table = 'vr_eventos';

    public function __construct () {
        return new Connect;
    }
}
