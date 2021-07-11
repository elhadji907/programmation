<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 11:32:23 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $numero_courrier
 * @property string $etablissement
 * @property string $niveau_etude
 * @property string $qualification
 * @property string $experience
 * @property string $deja_forme
 * @property string $adresse
 * @property string $pre_requis
 * @property string $option
 * @property string $autres_diplomes
 * @property string $telephone
 * @property string $fixe
 * @property int $nbre_piece
 * @property string $statut
 * @property string $motivation
 * @property string $items1
 * @property string $items2
 * @property \Carbon\Carbon $date_depot
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
 * @property string $file1
 * @property string $file2
 * @property string $file3
 * @property string $file4
 * @property string $file5
 * @property string $file6
 * @property string $file7
 * @property string $file8
 * @property string $file9
 * @property string $file10
 * @property int $users_id
 * @property int $lieux_id
 * @property int $items_id
 * @property int $projets_id
 * @property int $programmes_id
 * @property int $regions_id
 * @property int $diplomes_id
 * @property int $departements_id
 * @property int $types_demandes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Departement $departement
 * @property \App\Diplome $diplome
 * @property \App\Item $item
 * @property \App\Lieux $lieux
 * @property \App\Programme $programme
 * @property \App\Projet $projet
 * @property \App\Region $region
 * @property \App\TypesDemande $types_demande
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $collectives
 * @property \Illuminate\Database\Eloquent\Collection $commentaires
 * @property \Illuminate\Database\Eloquent\Collection $disponibilites
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $individuelles
 * @property \Illuminate\Database\Eloquent\Collection $pieces
 * @property \Illuminate\Database\Eloquent\Collection $titres
 *
 * @package App
 */
class Demandeur extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'nbre_piece' => 'int',
		'users_id' => 'int',
		'lieux_id' => 'int',
		'items_id' => 'int',
		'projets_id' => 'int',
		'programmes_id' => 'int',
		'regions_id' => 'int',
		'diplomes_id' => 'int',
		'departements_id' => 'int',
		'types_demandes_id' => 'int'
	];

	protected $dates = [
		'date_depot',
		'date1',
		'date2'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'numero_courrier',
		'etablissement',
		'niveau_etude',
		'qualification',
		'experience',
		'deja_forme',
		'adresse',
		'pre_requis',
		'option',
		'autres_diplomes',
		'telephone',
		'fixe',
		'nbre_piece',
		'statut',
		'motivation',
		'items1',
		'items2',
		'date_depot',
		'date1',
		'date2',
		'file1',
		'file2',
		'file3',
		'file4',
		'file5',
		'file6',
		'file7',
		'file8',
		'file9',
		'file10',
		'users_id',
		'lieux_id',
		'items_id',
		'projets_id',
		'programmes_id',
		'regions_id',
		'diplomes_id',
		'departements_id',
		'types_demandes_id'
	];

	public function departement()
	{
		return $this->belongsTo(\App\Departement::class, 'departements_id');
	}

	public function diplome()
	{
		return $this->belongsTo(\App\Diplome::class, 'diplomes_id');
	}

	public function item()
	{
		return $this->belongsTo(\App\Item::class, 'items_id');
	}

	public function lieux()
	{
		return $this->belongsTo(\App\Lieux::class);
	}

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}

	public function projet()
	{
		return $this->belongsTo(\App\Projet::class, 'projets_id');
	}

	public function region()
	{
		return $this->belongsTo(\App\Region::class, 'regions_id');
	}

	public function types_demande()
	{
		return $this->belongsTo(\App\TypesDemande::class, 'types_demandes_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function collectives()
	{
		return $this->hasMany(\App\Collective::class, 'demandeurs_id');
	}

	public function commentaires()
	{
		return $this->hasMany(\App\Commentaire::class, 'demandeurs_id');
	}

	public function disponibilites()
	{
		return $this->belongsToMany(\App\Disponibilite::class, 'demandeurs_has_disponibilites', 'demandeurs_id', 'disponibilites_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandeurs_has_modules', 'demandeurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function individuelles()
	{
		return $this->hasMany(\App\Individuelle::class, 'demandeurs_id');
	}

	public function pieces()
	{
		return $this->hasMany(\App\Piece::class, 'demandeurs_id');
	}

	public function titres()
	{
		return $this->hasMany(\App\Titre::class, 'demandeurs_id');
	}
}
