<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 22 Aug 2020 16:19:56 +0000.
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
		return $this->belongsToMany(\App\Demandeur::class, 'demandeursdepartements', 'departements_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
