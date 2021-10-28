<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Sueldo extends Model
{
	protected $table = 'vr_sueldos';

	protected $primaryKey = 'id_sueldo';

	protected $fillable = [
		'titulo',
		'costo'
	];

	public $timestamps = true;

	public function __construct()
	{
		return new Connect;
	}
}
