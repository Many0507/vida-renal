<?php 
namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    protected $table = 'vr_blog';

    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'texto',
        'imagen'
    ];

    public $timestamps = true;

    public function __construct () {
        return new Connect;
    }
}
