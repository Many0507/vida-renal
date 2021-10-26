<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class Conferencias extends Model
{
	protected $table = 'vr_conferencias';

	protected $primaryKey = 'id_conferencia';

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
