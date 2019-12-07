<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
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
 * @property int $nivauxs_id
 * @property int $diplomes_id
 * @property int $situations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Diplome $diplome
 * @property \App\Nivaux $nivaux
 * @property \App\Situation $situation
 * @property \App\User $user
 * @property \App\Village $village
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $secteurs
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
		'nivauxs_id' => 'int',
		'diplomes_id' => 'int',
		'situations_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'users_id',
		'villages_id',
		'nivauxs_id',
		'diplomes_id',
		'situations_id'
	];

	public function diplome()
	{
		return $this->belongsTo(\App\Diplome::class, 'diplomes_id');
	}

	public function nivaux()
	{
		return $this->belongsTo(\App\Nivaux::class, 'nivauxs_id');
	}

	public function situation()
	{
		return $this->belongsTo(\App\Situation::class, 'situations_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function village()
	{
		return $this->belongsTo(\App\Village::class, 'villages_id');
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'beneficiairesformations', 'beneficiaires_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function secteurs()
	{
		return $this->belongsToMany(\App\Secteur::class, 'beneficiairessecteurs', 'beneficiaires_id', 'secteurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formes()
	{
		return $this->hasMany(\App\Forme::class, 'beneficiaires_id');
	}
}
