<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = 'vr_talleres';

    public function __construct()
    {
        return new Connect;
    }
}
