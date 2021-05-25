<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Facturesdaf
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property \Carbon\Carbon $date_recep
 * @property string $designation
 * @property string $observation
 * @property float $montant
 * @property \Carbon\Carbon $date_depart
 * @property \Carbon\Carbon $date_retour
 * @property \Carbon\Carbon $date_transmission
 * @property \Carbon\Carbon $date_dg
 * @property \Carbon\Carbon $date_cg
 * @property \Carbon\Carbon $date_ac
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 *
 * @package App
 */
class Facturesdaf extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'montant' => 'float',
		'courriers_id' => 'int'
	];

	protected $dates = [
		'date_recep',
		'date_depart',
		'date_retour',
		'date_transmission',
		'date_dg',
		'date_cg',
		'date_ac'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_recep',
		'designation',
		'observation',
		'montant',
		'date_depart',
		'date_retour',
		'date_transmission',
		'date_dg',
		'date_cg',
		'date_ac',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}
}
