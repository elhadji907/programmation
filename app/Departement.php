<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Jul 2021 12:38:23 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $arrondissements
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
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

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'departements_id');
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

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_departements', 'departements_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'departements_id');
	}
}
