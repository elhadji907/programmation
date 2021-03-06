<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Jul 2021 10:58:34 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $code
 * @property string $name
 * @property string $qualifications
 * @property string $effectif_total
 * @property \Carbon\Carbon $date_pv
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property string $adresse
 * @property int $prevue_h
 * @property int $prevue_f
 * @property string $titre
 * @property string $attestation
 * @property int $forme_h
 * @property int $forme_f
 * @property int $total
 * @property string $lieu
 * @property string $convention_col
 * @property string $decret
 * @property string $beneficiaires
 * @property int $ingenieurs_id
 * @property int $agents_id
 * @property int $detfs_id
 * @property int $conventions_id
 * @property int $programmes_id
 * @property int $operateurs_id
 * @property int $traitements_id
 * @property int $niveauxs_id
 * @property int $specialites_id
 * @property int $courriers_id
 * @property int $statuts_id
 * @property int $types_formations_id
 * @property int $departements_id
 * @property int $modules_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agent $agent
 * @property \App\Convention $convention
 * @property \App\Courrier $courrier
 * @property \App\Departement $departement
 * @property \App\Detf $detf
 * @property \App\Ingenieur $ingenieur
 * @property \App\Module $module
 * @property \App\Niveaux $niveaux
 * @property \App\Operateur $operateur
 * @property \App\Programme $programme
 * @property \App\Specialite $specialite
 * @property \App\Statut $statut
 * @property \App\Traitement $traitement
 * @property \App\TypesFormation $types_formation
 * @property \Illuminate\Database\Eloquent\Collection $collectives
 * @property \Illuminate\Database\Eloquent\Collection $commens
 * @property \Illuminate\Database\Eloquent\Collection $details
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $factures
 * @property \Illuminate\Database\Eloquent\Collection $fcollectives
 * @property \Illuminate\Database\Eloquent\Collection $findividuelles
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 * @property \Illuminate\Database\Eloquent\Collection $individuelles
 *
 * @package App
 */
class Formation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'prevue_h' => 'int',
		'prevue_f' => 'int',
		'forme_h' => 'int',
		'forme_f' => 'int',
		'total' => 'int',
		'ingenieurs_id' => 'int',
		'agents_id' => 'int',
		'detfs_id' => 'int',
		'conventions_id' => 'int',
		'programmes_id' => 'int',
		'operateurs_id' => 'int',
		'traitements_id' => 'int',
		'niveauxs_id' => 'int',
		'specialites_id' => 'int',
		'courriers_id' => 'int',
		'statuts_id' => 'int',
		'types_formations_id' => 'int',
		'departements_id' => 'int',
		'modules_id' => 'int'
	];

	protected $dates = [
		'date_pv',
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'code',
		'name',
		'qualifications',
		'effectif_total',
		'date_pv',
		'date_debut',
		'date_fin',
		'adresse',
		'prevue_h',
		'prevue_f',
		'titre',
		'attestation',
		'forme_h',
		'forme_f',
		'total',
		'lieu',
		'convention_col',
		'decret',
		'beneficiaires',
		'ingenieurs_id',
		'agents_id',
		'detfs_id',
		'conventions_id',
		'programmes_id',
		'operateurs_id',
		'traitements_id',
		'niveauxs_id',
		'specialites_id',
		'courriers_id',
		'statuts_id',
		'types_formations_id',
		'departements_id',
		'modules_id'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Agent::class, 'agents_id');
	}

	public function convention()
	{
		return $this->belongsTo(\App\Convention::class, 'conventions_id');
	}

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function departement()
	{
		return $this->belongsTo(\App\Departement::class, 'departements_id');
	}

	public function detf()
	{
		return $this->belongsTo(\App\Detf::class, 'detfs_id');
	}

	public function ingenieur()
	{
		return $this->belongsTo(\App\Ingenieur::class, 'ingenieurs_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}

	public function niveaux()
	{
		return $this->belongsTo(\App\Niveaux::class, 'niveauxs_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}

	public function specialite()
	{
		return $this->belongsTo(\App\Specialite::class, 'specialites_id');
	}

	public function statut()
	{
		return $this->belongsTo(\App\Statut::class, 'statuts_id');
	}

	public function traitement()
	{
		return $this->belongsTo(\App\Traitement::class, 'traitements_id');
	}

	public function types_formation()
	{
		return $this->belongsTo(\App\TypesFormation::class, 'types_formations_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiaires_has_formations', 'formations_id', 'beneficiaires_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function collectives()
	{
		return $this->belongsToMany(\App\Collective::class, 'collectives_has_formations', 'formations_id', 'collectives_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function commens()
	{
		return $this->hasMany(\App\Commen::class, 'formations_id');
	}

	public function details()
	{
		return $this->hasMany(\App\Detail::class, 'formations_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_formations', 'formations_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function factures()
	{
		return $this->hasMany(\App\Facture::class, 'formations_id');
	}

	public function fcollectives()
	{
		return $this->hasMany(\App\Fcollective::class, 'formations_id');
	}

	public function findividuelles()
	{
		return $this->hasMany(\App\Findividuelle::class, 'formations_id');
	}

	public function evaluations()
	{
		return $this->belongsToMany(\App\Evaluation::class, 'formations_has_evaluations', 'formations_id', 'evaluations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function individuelles()
	{
		return $this->belongsToMany(\App\Individuelle::class, 'individuelles_has_formations', 'formations_id', 'individuelles_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
