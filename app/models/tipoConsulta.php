<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class TipoConsulta extends Model
{
	protected $table = 'vr_tipo_consulta';

	protected $primaryKey = 'id_tipo_consulta';

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
