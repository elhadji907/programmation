<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $uuid
 * @property string $adresse
 * @property string $matricule
 * @property string $cin
 * @property string $fonction
 * @property \Carbon\Carbon $date_embauche
 * @property string $classification
 * @property string $categorie_salaire
 * @property int $users_id
 * @property int $categories_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $category
 * @property \App\User $user
<<<<<<< HEAD
 * @property \Illuminate\Database\Eloquent\Collection $cellules
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $dossiers
 * @property \Illuminate\Database\Eloquent\Collection $antennes
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $services
 * @property \Illuminate\Database\Eloquent\Collection $missions
 * @property \Illuminate\Database\Eloquent\Collection $sorties
 *
 * @package App
 */
class Employee extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'users_id' => 'int',
		'categories_id' => 'int'
	];

	protected $dates = [
		'date_embauche'
	];

	protected $fillable = [
		'uuid',
		'adresse',
		'matricule',
		'cin',
		'fonction',
		'date_embauche',
		'classification',
		'categorie_salaire',
		'users_id',
		'categories_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'categories_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

<<<<<<< HEAD
	public function cellules()
	{
		return $this->belongsToMany(\App\Cellule::class, 'cellules_has_employees', 'employees_id', 'cellules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'employees_id');
	}

	public function dossiers()
	{
		return $this->hasMany(\App\Dossier::class, 'employees_id');
	}

	public function antennes()
	{
		return $this->belongsToMany(\App\Antenne::class, 'employees_has_antennes', 'employees_id', 'antennes_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function directions()
	{
		return $this->belongsToMany(\App\Direction::class, 'employees_has_directions', 'employees_id', 'directions_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'employees_has_formations', 'employees_id', 'formations_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function services()
	{
		return $this->belongsToMany(\App\Service::class, 'employees_has_services', 'employees_id', 'services_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function missions()
	{
		return $this->hasMany(\App\Mission::class, 'employees_id');
	}

	public function sorties()
	{
		return $this->hasMany(\App\Sorty::class, 'employees_id');
	}
}
