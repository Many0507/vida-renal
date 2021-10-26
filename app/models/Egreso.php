<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
	protected $table = 'vr_egresos';

	protected $primaryKey = 'id';

	protected $fillable = [
		'nombre',
		'tipo_consulta',
		'consulta_costo',
		'taller',
		'costo_taller',
		'insumos',
		'costo_insumos',
		'medicamentos',
		'costo_medicamentos',
		'laboratorios',
		'costo_laboratorios',
		'conferencias',
		'costo_conferencias',
	];

	public $timestamps = true;

	public function __construct()
	{
		return new Connect;
	}
}
