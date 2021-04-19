<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Operateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero_agrement
 * @property string $name
 * @property string $sigle
 * @property string $type_structure
 * @property string $ninea
 * @property string $telephone1
 * @property string $telephone2
 * @property string $fixe
 * @property string $email1
 * @property string $email2
 * @property string $adresse
 * @property int $communes_id
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Commune $commune
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $niveauxes
 * @property \Illuminate\Database\Eloquent\Collection $traitements
 *
 * @package App
 */
class Operateur extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'communes_id' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero_agrement',
		'name',
		'sigle',
		'type_structure',
		'ninea',
		'telephone1',
		'telephone2',
		'fixe',
		'email1',
		'email2',
		'adresse',
		'communes_id',
		'users_id'
	];

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'operateurs_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'operateurs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_operateurs', 'operateurs_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function niveauxes()
	{
		return $this->belongsToMany(\App\Niveaux::class, 'operateurs_has_niveaux', 'operateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function traitements()
	{
		return $this->hasMany(\App\Traitement::class, 'operateurs_id');
	}
}
