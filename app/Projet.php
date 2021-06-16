<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Jun 2021 12:10:48 +0000.
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
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property float $budjet
 * @property string $locatite
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $depenses
 *
 * @package App
 */
class Projet extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
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
		'debut',
		'fin',
		'budjet',
		'locatite'
	];

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'projets_id');
	}

	public function depenses()
	{
		return $this->hasMany(\App\Depense::class, 'projets_id');
	}
}
