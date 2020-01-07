<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Jan 2020 10:10:41 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $numero
 * @property string $cin
 * @property string $status
 * @property int $courriers_id
 * @property int $users_id
 * @property int $typedemandes_id
 * @property int $objets_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Objet $objet
 * @property \App\Typedemande $typedemande
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $programmes
 *
 * @package App
 */
class Demandeur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'courriers_id' => 'int',
		'users_id' => 'int',
		'typedemandes_id' => 'int',
		'objets_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'numero',
		'cin',
		'status',
		'courriers_id',
		'users_id',
		'typedemandes_id',
		'objets_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

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

	public function programmes()
	{
		return $this->hasMany(\App\Programme::class, 'demandeformations_id');
	}
}
