<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
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
 * @property int $users_id
 * @property int $villages_id
 * @property int $nivaus_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Nivaus $nivaus
 * @property \App\User $user
 * @property \App\Village $village
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $formes
 *
 * @package App
 */
class Beneficiaire extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'users_id' => 'int',
		'villages_id' => 'int',
		'nivaus_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'users_id',
		'villages_id',
		'nivaus_id'
	];

	public function nivaus()
	{
		return $this->belongsTo(\App\Nivaus::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function village()
	{
		return $this->belongsTo(\App\Village::class, 'villages_id');
	}

	public function domaines()
	{
		return $this->belongsToMany(\App\Domaine::class, 'beneficiairesdomaines', 'beneficiaires_id', 'domaines_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'beneficiairesformations', 'beneficiaires_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formes()
	{
		return $this->hasMany(\App\Forme::class, 'beneficiaires_id');
	}
}
