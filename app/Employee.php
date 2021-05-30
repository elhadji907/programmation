<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 00:53:25 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $uuid
 * @property string $adresse
 * @property string $cin
 * @property string $fonction
 * @property \Carbon\Carbon $date_embauche
 * @property string $classification
 * @property string $categorie_salaire
 * @property int $users_id
 * @property int $categories_id
 * @property int $fonctions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $category
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $agents
 * @property \Illuminate\Database\Eloquent\Collection $antennes
 * @property \Illuminate\Database\Eloquent\Collection $cellules
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $dossiers
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $services
 * @property \Illuminate\Database\Eloquent\Collection $missions
 * @property \Illuminate\Database\Eloquent\Collection $ordres_missions
 * @property \Illuminate\Database\Eloquent\Collection $prestataires
 * @property \Illuminate\Database\Eloquent\Collection $sorties
 * @property \Illuminate\Database\Eloquent\Collection $stagiaires
 *
 * @package App
 */
class Employee extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'users_id' => 'int',
		'categories_id' => 'int',
		'fonctions_id' => 'int'
	];

	protected $dates = [
		'date_embauche'
	];

	protected $fillable = [
		'uuid',
		'adresse',
		'cin',
		'fonction',
		'date_embauche',
		'classification',
		'categorie_salaire',
		'users_id',
		'categories_id',
		'fonctions_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'categories_id');
	}

	public function fonction()
	{
		return $this->belongsTo(\App\Fonction::class, 'fonctions_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function agents()
	{
		return $this->hasMany(\App\Agent::class, 'employees_id');
	}

	public function antennes()
	{
		return $this->belongsToMany(\App\Antenne::class, 'employees_has_antennes', 'employees_id', 'antennes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function cellules()
	{
		return $this->belongsToMany(\App\Cellule::class, 'cellules_has_employees', 'employees_id', 'cellules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'employees_id');
	}

	public function directions()
	{
		return $this->belongsToMany(\App\Direction::class, 'employees_has_directions', 'employees_id', 'directions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function dossiers()
	{
		return $this->hasMany(\App\Dossier::class, 'employees_id');
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'employees_has_formations', 'employees_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function services()
	{
		return $this->hasMany(\App\Service::class, 'employees_id');
	}

	public function missions()
	{
		return $this->hasMany(\App\Mission::class, 'employees_id');
	}

	public function ordres_missions()
	{
		return $this->hasMany(\App\OrdresMission::class, 'employees_id');
	}

	public function prestataires()
	{
		return $this->hasMany(\App\Prestataire::class, 'employees_id');
	}

	public function sorties()
	{
		return $this->hasMany(\App\Sorty::class, 'employees_id');
	}

	public function stagiaires()
	{
		return $this->hasMany(\App\Stagiaire::class, 'employees_id');
	}
}
