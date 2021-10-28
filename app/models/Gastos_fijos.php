<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Gastos_fijos extends Model
{
	protected $table = 'vr_gastos_fijos';

	protected $primaryKey = 'id_gastos_fijos';

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
