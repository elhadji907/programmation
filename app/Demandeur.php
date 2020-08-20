<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 19 Aug 2020 13:52:59 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero_courrier
 * @property string $numero
 * @property string $cin
 * @property string $experience
 * @property string $status
 * @property float $note
 * @property int $users_id
 * @property int $typedemandes_id
 * @property int $objets_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Objet $objet
 * @property \App\Typedemande $typedemande
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Demandeur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'note' => 'float',
		'users_id' => 'int',
		'typedemandes_id' => 'int',
		'objets_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero_courrier',
		'numero',
		'cin',
		'experience',
		'status',
		'note',
		'users_id',
		'typedemandes_id',
		'objets_id'
	];

	public function objet()
	{
		return $this->belongsTo(\App\Objet::class, 'objets_id');
	}

	public function typedemande()
	{
		return $this->belongsTo(\App\Typedemande::class, 'typedemandes_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'demandeursmodules', 'demandeurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
