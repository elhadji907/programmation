<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Vehicule
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $marque
 * @property string $type_carburant
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $missions
 * @property \Illuminate\Database\Eloquent\Collection $sorties
 *
 * @package App
 */
class Vehicule extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $fillable = [
		'uuid',
		'matricule',
		'marque',
		'type_carburant'
	];

	public function missions()
	{
		return $this->hasMany(\App\Mission::class, 'vehicules_id');
	}

	public function sorties()
	{
		return $this->hasMany(\App\Sorty::class, 'vehicules_id');
	}
}
