<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Jun 2021 16:05:58 +0000.
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
 * @property string $designation
 * @property string $observation
 * @property \Carbon\Carbon $date_visa
 * @property \Carbon\Carbon $date_mandat
 * @property float $tva
 * @property float $ir
 * @property string $nb_pc
 * @property string $destinataire
 * @property \Carbon\Carbon $date_paye
 * @property int $num_bord
 * @property float $montant
 * @property float $autres_montant
 * @property float $total
 * @property int $users_id
 * @property int $types_courriers_id
 * @property int $projets_id
 * @property int $traitementcourriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Projet $projet
 * @property \App\Traitementcourrier $traitementcourrier
 * @property \App\TypesCourrier $types_courrier
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $banques
 * @property \Illuminate\Database\Eloquent\Collection $bordereaus
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $imputations
 * @property \Illuminate\Database\Eloquent\Collection $departs
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $etats
 * @property \Illuminate\Database\Eloquent\Collection $etats_previs
 * @property \Illuminate\Database\Eloquent\Collection $facturesdafs
 * @property \Illuminate\Database\Eloquent\Collection $fads
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $internes
 * @property \Illuminate\Database\Eloquent\Collection $missions
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $ordres_missions
 * @property \Illuminate\Database\Eloquent\Collection $recues
 * @property \Illuminate\Database\Eloquent\Collection $tresors
 *
 * @package App
 */
class Courrier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'tva' => 'float',
		'ir' => 'float',
		'num_bord' => 'int',
		'montant' => 'float',
		'autres_montant' => 'float',
		'total' => 'float',
		'users_id' => 'int',
		'types_courriers_id' => 'int',
		'projets_id' => 'int',
		'traitementcourriers_id' => 'int'
	];

	protected $dates = [
		'date',
		'date_imp',
		'date_recep',
		'date_cores',
		'date_rejet',
		'date_liq',
		'date_visa',
		'date_mandat',
		'date_paye'
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
		'designation',
		'observation',
		'date_visa',
		'date_mandat',
		'tva',
		'ir',
		'nb_pc',
		'destinataire',
		'date_paye',
		'num_bord',
		'montant',
		'autres_montant',
		'total',
		'users_id',
		'types_courriers_id',
		'projets_id',
		'traitementcourriers_id'
	];

	public function getFile(){
		$filePath = $this->file ?? 'recues/default.jpg';
		return "/storage/" . $filePath;
	}

	public function projet()
	{
		return $this->belongsTo(\App\Projet::class, 'projets_id');
	}

	public function traitementcourrier()
	{
		return $this->belongsTo(\App\Traitementcourrier::class, 'traitementcourriers_id');
	}

	public function types_courrier()
	{
		return $this->belongsTo(\App\TypesCourrier::class, 'types_courriers_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'courriers_id');
	}

	public function banques()
	{
		return $this->hasMany(\App\Banque::class, 'courriers_id');
	}

	public function bordereaus()
	{
		return $this->hasMany(\App\Bordereau::class, 'courriers_id');
	}

	public function comments()
	{
		return $this->hasMany(\App\Comment::class, 'courriers_id');
	}

	public function imputations()
	{
		return $this->belongsToMany(\App\Imputation::class, 'courriers_has_imputations', 'courriers_id', 'imputations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function departs()
	{
		return $this->hasMany(\App\Depart::class, 'courriers_id');
	}

	public function directions()
	{
		return $this->belongsToMany(\App\Direction::class, 'directions_has_courriers', 'courriers_id', 'directions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_courriers', 'courriers_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function etats()
	{
		return $this->hasMany(\App\Etat::class, 'courriers_id');
	}

	public function etats_previs()
	{
		return $this->hasMany(\App\EtatsPrevi::class, 'courriers_id');
	}

	public function facturesdafs()
	{
		return $this->hasMany(\App\Facturesdaf::class, 'courriers_id');
	}

	public function fads()
	{
		return $this->hasMany(\App\Fad::class, 'courriers_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'courriers_id');
	}

	public function internes()
	{
		return $this->hasMany(\App\Interne::class, 'courriers_id');
	}

	public function missions()
	{
		return $this->hasMany(\App\Mission::class, 'courriers_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'courriers_id');
	}

	public function ordres_missions()
	{
		return $this->hasMany(\App\OrdresMission::class, 'courriers_id');
	}

	public function recues()
	{
		return $this->hasMany(\App\Recue::class, 'courriers_id');
	}

	public function tresors()
	{
		return $this->hasMany(\App\Tresor::class, 'courriers_id');
	}
}