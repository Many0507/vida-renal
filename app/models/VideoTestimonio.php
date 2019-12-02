<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class VideoTestimonio extends Model
{
    protected $table = 'vr_video_testimonio';

    protected $primaryKey = 'id';

    protected $fillable = [
        'video'
    ];

    public $timestamps = true;

    public function __construct()
    {
        return new Connect;
    }
}
