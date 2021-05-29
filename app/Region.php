<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $departements
 * @property \Illuminate\Database\Eloquent\Collection $ecoles
 * @property \Illuminate\Database\Eloquent\Collection $programmes
 *
 * @package App
 */
class Region extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $fillable = [
		'uuid',
		'nom'
	];

	public function departements()
	{
		return $this->hasMany(\App\Departement::class, 'regions_id');
	}

	public function ecoles()
	{
		return $this->hasMany(\App\Ecole::class, 'regions_id');
	}

	public function programmes()
	{
		return $this->belongsToMany(\App\Programme::class, 'programmes_has_regions', 'regions_id', 'programmes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
