<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Aug 2021 20:55:03 +0000.
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
 * @property string $rccm
 * @property string $quitus
 * @property \Carbon\Carbon $date
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property \Carbon\Carbon $date_renew
 * @property \Carbon\Carbon $debut_quitus
 * @property \Carbon\Carbon $fin_quitus
 * @property string $telephone1
 * @property string $telephone2
 * @property string $fixe
 * @property string $email1
 * @property string $email2
 * @property string $adresse
 * @property string $nom_responsable
 * @property string $prenom_responsable
 * @property string $cin_responsable
 * @property string $telephone_responsable
 * @property string $email_responsable
 * @property string $fonction_responsable
 * @property string $qualification
 * @property int $users_id
 * @property int $rccms_id
 * @property int $nineas_id
 * @property int $types_operateurs_id
 * @property int $specialites_id
 * @property int $courriers_id
 * @property int $departements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Departement $departement
 * @property \App\Specialite $specialite
 * @property \App\TypesOperateur $types_operateur
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $commenteres
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $niveauxes
 * @property \Illuminate\Database\Eloquent\Collection $regions
 * @property \Illuminate\Database\Eloquent\Collection $traitements
 *
 * @package App
 */
class Operateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'users_id' => 'int',
		'rccms_id' => 'int',
		'nineas_id' => 'int',
		'types_operateurs_id' => 'int',
		'specialites_id' => 'int',
		'courriers_id' => 'int',
		'departements_id' => 'int'
	];

	protected $dates = [
		'date',
		'date_debut',
		'date_fin',
		'date_renew',
		'debut_quitus',
		'fin_quitus'
	];

	protected $fillable = [
		'uuid',
		'numero_agrement',
		'name',
		'sigle',
		'type_structure',
		'ninea',
		'rccm',
		'quitus',
		'date',
		'date_debut',
		'date_fin',
		'date_renew',
		'debut_quitus',
		'fin_quitus',
		'telephone1',
		'telephone2',
		'fixe',
		'email1',
		'email2',
		'adresse',
		'nom_responsable',
		'prenom_responsable',
		'cin_responsable',
		'telephone_responsable',
		'email_responsable',
		'fonction_responsable',
		'qualification',
		'users_id',
		'rccms_id',
		'nineas_id',
		'types_operateurs_id',
		'specialites_id',
		'courriers_id',
		'departements_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function departement()
	{
		return $this->belongsTo(\App\Departement::class, 'departements_id');
	}

	public function ninea()
	{
		return $this->belongsTo(\App\Ninea::class, 'nineas_id');
	}

	public function rccm()
	{
		return $this->belongsTo(\App\Rccm::class, 'rccms_id');
	}

	public function specialite()
	{
		return $this->belongsTo(\App\Specialite::class, 'specialites_id');
	}

	public function types_operateur()
	{
		return $this->belongsTo(\App\TypesOperateur::class, 'types_operateurs_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'operateurs_id');
	}

	public function commenteres()
	{
		return $this->hasMany(\App\Commentere::class, 'operateurs_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'operateurs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_operateurs', 'operateurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function niveauxes()
	{
		return $this->belongsToMany(\App\Niveaux::class, 'operateurs_has_niveaux', 'operateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function regions()
	{
		return $this->belongsToMany(\App\Region::class, 'operateurs_has_regions', 'operateurs_id', 'regions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function traitements()
	{
		return $this->hasMany(\App\Traitement::class, 'operateurs_id');
	}
}
