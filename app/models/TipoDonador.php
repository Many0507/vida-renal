<?php

namespace App\Models;

use App\Database\DbConnection as Connect;
use Illuminate\Database\Eloquent\Model;

class TipoDonador extends Model
{
	protected $table = 'vr_tipo_donador';

	protected $primaryKey = 'id';

	protected $fillable = [
		'tipo',
	];

	public $timestamps = true;

	public function __construct()
	{
		return new Connect;
	}
}
