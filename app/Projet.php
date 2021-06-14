<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:23 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Projet
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $depenses_id
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property float $budjet
 * @property string $locatite
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Depense $depense
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 *
 * @package App
 */
class Projet extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'depenses_id' => 'int',
		'budjet' => 'float'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'depenses_id',
		'debut',
		'fin',
		'budjet',
		'locatite'
	];

	public function depense()
	{
		return $this->belongsTo(\App\Depense::class, 'depenses_id');
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'projets_id');
	}
}
