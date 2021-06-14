<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property int $code
 * @property string $name
 * @property string $qualifications
 * @property string $effectif_total
 * @property \Carbon\Carbon $date_pv
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property string $adresse
 * @property int $prevue_h
 * @property int $prevue_f
 * @property string $type
 * @property string $titre
 * @property string $attestation
 * @property int $forme_h
 * @property int $forme_f
 * @property int $total
 * @property string $lieu
 * @property string $convention_col
 * @property string $decret
 * @property int $ingenieurs_id
 * @property int $factures_id
 * @property int $agents_id
 * @property int $detfs_id
 * @property int $conventions_id
 * @property int $programmes_id
 * @property int $operateurs_id
 * @property int $demandeurs_id
 * @property int $traitements_id
 * @property int $niveauxs_id
 * @property int $specialites_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agent $agent
 * @property \App\Facture $facture
 * @property \App\Convention $convention
 * @property \App\Courrier $courrier
 * @property \App\Demandeur $demandeur
 * @property \App\Detf $detf
 * @property \App\Ingenieur $ingenieur
 * @property \App\Niveaux $niveaux
 * @property \App\Operateur $operateur
 * @property \App\Programme $programme
 * @property \App\Specialite $specialite
 * @property \App\Traitement $traitement
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $details
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 *
 * @package App
 */
class Formation extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'code' => 'int',
		'prevue_h' => 'int',
		'prevue_f' => 'int',
		'forme_h' => 'int',
		'forme_f' => 'int',
		'total' => 'int',
		'ingenieurs_id' => 'int',
		'factures_id' => 'int',
		'agents_id' => 'int',
		'detfs_id' => 'int',
		'conventions_id' => 'int',
		'programmes_id' => 'int',
		'operateurs_id' => 'int',
		'demandeurs_id' => 'int',
		'traitements_id' => 'int',
		'niveauxs_id' => 'int',
		'specialites_id' => 'int',
		'courriers_id' => 'int'
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
		'type',
		'titre',
		'attestation',
		'forme_h',
		'forme_f',
		'total',
		'lieu',
		'convention_col',
		'decret',
		'ingenieurs_id',
		'factures_id',
		'agents_id',
		'detfs_id',
		'conventions_id',
		'programmes_id',
		'operateurs_id',
		'demandeurs_id',
		'traitements_id',
		'niveauxs_id',
		'specialites_id',
		'courriers_id'
	];

	public function agent()
	{
		return $this->belongsTo(\App\Agent::class, 'agents_id');
	}

	public function facture()
	{
		return $this->belongsTo(\App\Facture::class, 'factures_id');
	}

	public function convention()
	{
		return $this->belongsTo(\App\Convention::class, 'conventions_id');
	}

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function detf()
	{
		return $this->belongsTo(\App\Detf::class, 'detfs_id');
	}

	public function ingenieur()
	{
		return $this->belongsTo(\App\Ingenieur::class, 'ingenieurs_id');
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

	public function traitement()
	{
		return $this->belongsTo(\App\Traitement::class, 'traitements_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiaires_has_formations', 'formations_id', 'beneficiaires_id')
					->withPivot('deleted_at')
					->withTimestamps();
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

	public function evaluations()
	{
		return $this->belongsToMany(\App\Evaluation::class, 'formations_has_evaluations', 'formations_id', 'evaluations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
