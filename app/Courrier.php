<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Apr 2021 11:19:21 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Courrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $objet
 * @property string $name
 * @property string $types
 * @property string $description
 * @property string $fichier
 * @property string $statut
 * @property \Carbon\Carbon $date
 * @property \Carbon\Carbon $date_imp
 * @property \Carbon\Carbon $date_recep
 * @property \Carbon\Carbon $date_rejet
 * @property \Carbon\Carbon $date_liq
 * @property int $gestionnaires_id
 * @property int $users_id
 * @property int $employees_id
 * @property int $types_courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\TypesCourrier $types_courrier
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $antennes
 * @property \Illuminate\Database\Eloquent\Collection $cellules
 * @property \Illuminate\Database\Eloquent\Collection $dafs
 * @property \Illuminate\Database\Eloquent\Collection $departs
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $internes
 * @property \Illuminate\Database\Eloquent\Collection $recues
 * @property \Illuminate\Database\Eloquent\Collection $services
 *
 * @package App
 */
class Courrier extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'gestionnaires_id' => 'int',
		'users_id' => 'int',
		'employees_id' => 'int',
		'types_courriers_id' => 'int'
	];

	protected $dates = [
		'date',
		'date_imp',
		'date_recep',
		'date_rejet',
		'date_liq'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'objet',
		'name',
		'types',
		'description',
		'fichier',
		'statut',
		'date',
		'date_imp',
		'date_recep',
		'date_rejet',
		'date_liq',
		'gestionnaires_id',
		'users_id',
		'employees_id',
		'types_courriers_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function types_courrier()
	{
		return $this->belongsTo(\App\TypesCourrier::class, 'types_courriers_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function antennes()
	{
		return $this->hasMany(\App\Antenne::class, 'courriers_id');
	}

	public function cellules()
	{
		return $this->hasMany(\App\Cellule::class, 'courriers_id');
	}

	public function dafs()
	{
		return $this->hasMany(\App\Daf::class, 'courriers_id');
	}

	public function departs()
	{
		return $this->hasMany(\App\Depart::class, 'courriers_id');
	}

	public function directions()
	{
		return $this->hasMany(\App\Direction::class, 'courriers_id');
	}

	public function internes()
	{
		return $this->hasMany(\App\Interne::class, 'courriers_id');
	}

	public function recues()
	{
		return $this->hasMany(\App\Recue::class, 'courriers_id');
	}

	public function services()
	{
		return $this->hasMany(\App\Service::class, 'courriers_id');
	}
}
