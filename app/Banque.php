<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Banque
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $numero
 * @property int $courriers_id
 * @property string $observation
 * @property float $montant
 * @property \Carbon\Carbon $date_ac
 * @property \Carbon\Carbon $date_dg
 * @property \Carbon\Carbon $date_cg
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 *
 * @package App
 */
class Banque extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'courriers_id' => 'int',
		'montant' => 'float'
	];

	protected $dates = [
		'date_ac',
		'date_dg',
		'date_cg'
	];

	protected $fillable = [
		'uuid',
		'name',
		'numero',
		'courriers_id',
		'observation',
		'montant',
		'date_ac',
		'date_dg',
		'date_cg'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}
}
