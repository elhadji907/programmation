<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 22 Aug 2020 16:06:02 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero_courrier
 * @property string $numero
 * @property string $cin
 * @property string $experience
 * @property string $projet
 * @property string $information
 * @property \Carbon\Carbon $date_depot
 * @property string $status
 * @property float $note
 * @property int $users_id
 * @property int $typedemandes_id
 * @property int $objets_id
 * @property int $localites_id
 * @property int $programmes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Localite $localite
 * @property \App\Objet $objet
 * @property \App\Programme $programme
 * @property \App\Typedemande $typedemande
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $departements
 * @property \Illuminate\Database\Eloquent\Collection $diplomes
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $nivauxes
 *
 * @package App
 */
class Demandeur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'note' => 'float',
		'users_id' => 'int',
		'typedemandes_id' => 'int',
		'objets_id' => 'int',
		'localites_id' => 'int',
		'programmes_id' => 'int'
	];

	protected $dates = [
		'date_depot'
	];

	protected $fillable = [
		'uuid',
		'numero_courrier',
		'numero',
		'cin',
		'experience',
		'projet',
		'information',
		'date_depot',
		'status',
		'note',
		'users_id',
		'typedemandes_id',
		'objets_id',
		'localites_id',
		'programmes_id'
	];

	public function localite()
	{
		return $this->belongsTo(\App\Localite::class, 'localites_id');
	}

	public function objet()
	{
		return $this->belongsTo(\App\Objet::class, 'objets_id');
	}

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}

	public function typedemande()
	{
		return $this->belongsTo(\App\Typedemande::class, 'typedemandes_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function departements()
	{
		return $this->belongsToMany(\App\Departement::class, 'demandeursdepartements', 'demandeurs_id', 'departements_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function diplomes()
	{
		return $this->belongsToMany(\App\Diplome::class, 'demandeursdiplomes', 'demandeurs_id', 'diplomes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandeursmodules', 'demandeurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function nivauxes()
	{
		return $this->belongsToMany(\App\Nivaux::class, 'demandeursnivauxs', 'demandeurs_id', 'nivauxs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
