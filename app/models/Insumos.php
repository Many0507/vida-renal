<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
	protected $table = 'vr_insumos';

	protected $primaryKey = 'id_insumo';

	protected $fillable = [
		'nombre',
		'costo'
	];

	public $timestamps = true;

	public function __construct()
	{
		return new Connect;
	}
}
