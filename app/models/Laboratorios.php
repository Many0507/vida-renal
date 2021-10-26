<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model
{
	protected $table = 'vr_laboratorios';

	protected $primaryKey = 'id_laboratorio';

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
