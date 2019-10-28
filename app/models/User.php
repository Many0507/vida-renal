<?php
namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';

    public function __construct () {
        return new Connect;
    }
}