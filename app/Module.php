<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Jul 2021 10:58:27 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $description
 * @property string $qualification
 * @property int $domaines_id
 * @property int $specialites_id
 * @property int $statuts_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \App\Specialite $specialite
 * @property \App\Statut $statut
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $evaluateurs
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $departements
 * @property \Illuminate\Database\Eloquent\Collection $niveauxes
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $programmes
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'domaines_id' => 'int',
		'specialites_id' => 'int',
		'statuts_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'description',
		'qualification',
		'domaines_id',
		'specialites_id',
		'statuts_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function specialite()
	{
		return $this->belongsTo(\App\Specialite::class, 'specialites_id');
	}

	public function statut()
	{
		return $this->belongsTo(\App\Statut::class, 'statuts_id');
	}

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeurs_has_modules', 'modules_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function evaluateurs()
	{
		return $this->belongsToMany(\App\Evaluateur::class, 'evaluateurs_has_modules', 'modules_id', 'evaluateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'modules_id');
	}

	public function departements()
	{
		return $this->belongsToMany(\App\Departement::class, 'modules_has_departements', 'modules_id', 'departements_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function niveauxes()
	{
		return $this->belongsToMany(\App\Niveaux::class, 'modules_has_niveauxs', 'modules_id', 'niveauxs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'modules_has_operateurs', 'modules_id', 'operateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function programmes()
	{
		return $this->belongsToMany(\App\Programme::class, 'programmes_has_modules', 'modules_id', 'programmes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
