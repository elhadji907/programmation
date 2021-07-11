<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 14:58:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Departement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $regions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Region $region
 * @property \Illuminate\Database\Eloquent\Collection $arrondissements
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Departement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'regions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'regions_id'
	];

	public function region()
	{
		return $this->belongsTo(\App\Region::class, 'regions_id');
	}

	public function arrondissements()
	{
		return $this->hasMany(\App\Arrondissement::class, 'departements_id');
	}

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class, 'departements_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'departements_id');
	}
}
