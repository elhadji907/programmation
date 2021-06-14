<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $adresse
 * @property string $cin
 * @property \Carbon\Carbon $date_embauche
 * @property string $classification
 * @property string $categorie_salaire
 * @property int $users_id
 * @property int $categories_id
 * @property int $fonctions_id
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $category
 * @property \App\Direction $direction
 * @property \App\Fonction $fonction
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $charges
 * @property \Illuminate\Database\Eloquent\Collection $congers
 * @property \Illuminate\Database\Eloquent\Collection $dossiers
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $imputations
 * @property \Illuminate\Database\Eloquent\Collection $familles
 * @property \Illuminate\Database\Eloquent\Collection $missions
 * @property \Illuminate\Database\Eloquent\Collection $ordres_missions
 * @property \Illuminate\Database\Eloquent\Collection $prestataires
 * @property \Illuminate\Database\Eloquent\Collection $salaires
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
		'fonctions_id' => 'int',
		'directions_id' => 'int'
	];

	protected $dates = [
		'date_embauche'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'adresse',
		'cin',
		'date_embauche',
		'classification',
		'categorie_salaire',
		'users_id',
		'categories_id',
		'fonctions_id',
		'directions_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'categories_id');
	}

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function fonction()
	{
		return $this->belongsTo(\App\Fonction::class, 'fonctions_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function charges()
	{
		return $this->hasMany(\App\Charge::class, 'employees_id');
	}

	public function congers()
	{
		return $this->hasMany(\App\Conger::class, 'employees_id');
	}

	public function dossiers()
	{
		return $this->hasMany(\App\Dossier::class, 'employees_id');
	}

	public function courriers()
	{
		return $this->belongsToMany(\App\Courrier::class, 'employees_has_courriers', 'employees_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'employees_has_formations', 'employees_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function imputations()
	{
		return $this->belongsToMany(\App\Imputation::class, 'employees_has_imputations', 'employees_id', 'imputations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function familles()
	{
		return $this->hasMany(\App\Famille::class, 'employees_id');
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

	public function salaires()
	{
		return $this->hasMany(\App\Salaire::class, 'employees_id');
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
