<?php 
namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    protected $table = 'vr_blog';

    public function __construct () {
        return new Connect;
    }
}
