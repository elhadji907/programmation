<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Apr 2021 11:19:21 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Beneficiaire
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property \Carbon\Carbon $date
 * @property string $lieu
 * @property int $village_id
 * @property int $gestionnaires_id
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\User $user
 * @property \App\Village $village
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Beneficiaire extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'villages_id' => 'int',
		'gestionnaires_id' => 'int',
		'users_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'date',
		'lieu',
		'village_id',
		'gestionnaires_id',
		'users_id'
	];

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function village()
	{
		return $this->belongsTo(\App\Village::class);
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'beneficiaires_has_formations', 'beneficiaires_id', 'formations_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
