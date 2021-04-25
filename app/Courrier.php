<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Apr 2021 18:20:17 +0000.
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
 * @property string $expediteur
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $message
 * @property string $email
 * @property string $fax
 * @property string $bp
 * @property string $telephone
 * @property string $file
 * @property string $legende
 * @property string $statut
 * @property \Carbon\Carbon $date
 * @property string $adresse
 * @property \Carbon\Carbon $date_imp
 * @property \Carbon\Carbon $date_recep
 * @property \Carbon\Carbon $date_cores
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
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $imputations
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
		'date_cores',
		'date_rejet',
		'date_liq'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'objet',
		'expediteur',
		'name',
		'type',
		'description',
		'message',
		'email',
		'fax',
		'bp',
		'telephone',
		'file',
		'legende',
		'statut',
		'date',
		'adresse',
		'date_imp',
		'date_recep',
		'date_cores',
		'date_rejet',
		'date_liq',
		'gestionnaires_id',
		'users_id',
		'employees_id',
		'types_courriers_id'
	];

	public function getFile(){
		$filePath = $this->file ?? 'recues/default.jpg';
		return "/storage/" . $filePath;
	}
	
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

	public function comments()
	{
		return $this->morphMany('\App\Comment', 'commentable')->latest();
	}

	public function imputations()
	{
		return $this->belongsToMany(\App\Imputation::class, 'courriers_has_imputations', 'courriers_id', 'imputations_id')
					->withPivot('deleted_at')
					->withTimestamps();
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
