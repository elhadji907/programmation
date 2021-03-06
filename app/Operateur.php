<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Jul 2021 13:16:41 +0000.
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
 * @property string $telephone1
 * @property string $telephone2
 * @property string $fixe
 * @property string $email1
 * @property string $email2
 * @property string $adresse
 * @property int $communes_id
 * @property int $users_id
 * @property int $rccms_id
 * @property int $nineas_id
 * @property int $types_operateurs_id
 * @property int $quitus_id
 * @property int $responsables_id
 * @property int $specialites_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Commune $commune
 * @property \App\Courrier $courrier
 * @property \App\Responsable $responsable
 * @property \App\Specialite $specialite
 * @property \App\TypesOperateur $types_operateur
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $commenteres
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
		'users_id' => 'int',
		'rccms_id' => 'int',
		'nineas_id' => 'int',
		'types_operateurs_id' => 'int',
		'quitus_id' => 'int',
		'responsables_id' => 'int',
		'specialites_id' => 'int',
		'courriers_id' => 'int'
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
		'telephone1',
		'telephone2',
		'fixe',
		'email1',
		'email2',
		'adresse',
		'communes_id',
		'users_id',
		'rccms_id',
		'nineas_id',
		'types_operateurs_id',
		'quitus_id',
		'responsables_id',
		'specialites_id',
		'courriers_id'
	];

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function ninea()
	{
		return $this->belongsTo(\App\Ninea::class, 'nineas_id');
	}

	public function quitus()
	{
		return $this->belongsTo(\App\Quitus::class);
	}

	public function rccm()
	{
		return $this->belongsTo(\App\Rccm::class, 'rccms_id');
	}

	public function responsable()
	{
		return $this->belongsTo(\App\Responsable::class, 'responsables_id');
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
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function traitements()
	{
		return $this->hasMany(\App\Traitement::class, 'operateurs_id');
	}
}
