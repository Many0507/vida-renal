<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'vr_admin';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user',
        'pass'
    ];

    public $timestamps = true;

    public function __construct()
    {
        return new Connect;
    }
}
