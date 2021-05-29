<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Disponibilite
 * 
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
 * @property \Carbon\Carbon $date3
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Disponibilite extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $dates = [
		'date1',
		'date2',
		'date3'
	];

	protected $fillable = [
		'uuid',
		'date1',
		'date2',
		'date3'
	];

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeurs_has_disponibilites', 'disponibilites_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
