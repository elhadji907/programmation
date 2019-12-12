<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property string $status
 * @property int $courriers_id
 * @property int $users_id
 * @property int $typedemandes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Typedemande $typedemande
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
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
		'typedemandes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'status',
		'courriers_id',
		'users_id',
		'typedemandes_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function typedemande()
	{
		return $this->belongsTo(\App\Typedemande::class, 'typedemandes_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'demandeurs_id');
	}

	public function programmes()
	{
		return $this->hasMany(\App\Programme::class, 'demandeformations_id');
	}
}
