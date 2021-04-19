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
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
<<<<<<< HEAD
 * @property string $numero
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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
<<<<<<< HEAD
 * @property string $situation
 * @property string $items1
 * @property string $items2
 * @property string $items3
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
 * @property int $users_id
 * @property int $lieux_id
=======
 * @property int $users_id
 * @property int $lieux_id
 * @property string $items1
 * @property string $items2
 * @property string $items3
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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
<<<<<<< HEAD
 * @property \Illuminate\Database\Eloquent\Collection $diplomes
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

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
<<<<<<< HEAD
		'numero',
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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
<<<<<<< HEAD
		'situation',
		'items1',
		'items2',
		'items3',
		'date1',
		'date2',
		'users_id',
		'lieux_id',
=======
		'users_id',
		'lieux_id',
		'items1',
		'items2',
		'items3',
		'date1',
		'date2',
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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

<<<<<<< HEAD
	public function diplomes()
	{
		return $this->belongsToMany(\App\Diplome::class, 'demandeurs_has_diplomes', 'demandeurs_id', 'diplomes_id')
=======
	public function disponibilites()
	{
		return $this->belongsToMany(\App\Disponibilite::class, 'demandeurs_has_disponibilites', 'demandeurs_id', 'disponibilites_id')
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
					->withPivot('deleted_at')
					->withTimestamps();
	}

<<<<<<< HEAD
	public function disponibilites()
	{
		return $this->belongsToMany(\App\Disponibilite::class, 'demandeurs_has_disponibilites', 'demandeurs_id', 'disponibilites_id')
=======
	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandeurs_has_modules', 'demandeurs_id', 'modules_id')
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
					->withPivot('deleted_at')
					->withTimestamps();
	}

<<<<<<< HEAD
	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandeurs_has_modules', 'demandeurs_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
=======
	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'demandeurs_id');
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	}

	public function individuelles()
	{
<<<<<<< HEAD
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
=======
		return $this->hasMany(\App\Individuelle::class, 'demandeurs_id');
	}

	public function pieces()
	{
		return $this->hasMany(\App\Piece::class, 'demandeurs_id');
	}

	public function titres()
	{
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
		return $this->hasMany(\App\Titre::class, 'demandeurs_id');
	}
}
