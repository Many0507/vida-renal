<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
	protected $table = 'vr_medicamentos';

	protected $primaryKey = 'id_medicamentos';

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
