<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Charge
 * 
 * @property int $id
 * @property string $uuid
 * @property string $cin
 * @property string $items1
 * @property \Carbon\Carbon $date1
 * @property int $duree
 * @property float $accompt
 * @property float $reliquat
 * @property int $demandeurs_id
 * @property int $ecoles_id
 * @property int $annee
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 * @property \App\Ecole $ecole
 *
 * @package App
 */
class Charge extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'duree' => 'int',
		'accompt' => 'float',
		'reliquat' => 'float',
		'demandeurs_id' => 'int',
		'ecoles_id' => 'int',
		'annee' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'cin',
		'items1',
		'date1',
		'duree',
		'accompt',
		'reliquat',
		'demandeurs_id',
		'ecoles_id',
		'annee'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function ecole()
	{
		return $this->belongsTo(\App\Ecole::class, 'ecoles_id');
	}
}
