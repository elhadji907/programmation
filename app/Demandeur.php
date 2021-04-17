<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $sexe
 * @property string $situation_professionnelle
 * @property string $etablissement
 * @property string $niveau_etude
 * @property string $diplome
 * @property string $qualification
 * @property string $experience
 * @property string $deja_forme
 * @property string $pre_requis
 * @property string $type
 * @property string $projet
 * @property int $users_id
 * @property int $lieux_id
 * @property string $items1
 * @property string $items2
 * @property string $items3
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
 * @property int $items_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Item $item
 * @property \App\Lieux $lieux
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $charges
 * @property \Illuminate\Database\Eloquent\Collection $collectives
 * @property \Illuminate\Database\Eloquent\Collection $disponibilites
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $individuelles
 * @property \Illuminate\Database\Eloquent\Collection $pieces
 * @property \Illuminate\Database\Eloquent\Collection $titres
 *
 * @package App
 */
class Demandeur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int',
		'lieux_id' => 'int',
		'items_id' => 'int'
	];

	protected $dates = [
		'date1',
		'date2'
	];

	protected $fillable = [
		'uuid',
		'sexe',
		'situation_professionnelle',
		'etablissement',
		'niveau_etude',
		'diplome',
		'qualification',
		'experience',
		'deja_forme',
		'pre_requis',
		'type',
		'projet',
		'users_id',
		'lieux_id',
		'items1',
		'items2',
		'items3',
		'date1',
		'date2',
		'items_id'
	];

	public function item()
	{
		return $this->belongsTo(\App\Item::class, 'items_id');
	}

	public function lieux()
	{
		return $this->belongsTo(\App\Lieux::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function charges()
	{
		return $this->hasMany(\App\Charge::class, 'demandeurs_id');
	}

	public function collectives()
	{
		return $this->hasMany(\App\Collective::class, 'demandeurs_id');
	}

	public function disponibilites()
	{
		return $this->belongsToMany(\App\Disponibilite::class, 'demandeurs_has_disponibilites', 'demandeurs_id', 'disponibilites_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandeurs_has_modules', 'demandeurs_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'demandeurs_id');
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
