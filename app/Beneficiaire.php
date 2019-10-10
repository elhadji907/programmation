<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 10 Oct 2019 11:12:18 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Beneficiaire
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property int $quartiers_id
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Quartier $quartier
 * @property \App\User $user
 *
 * @package App
 */
class Beneficiaire extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'quartiers_id' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'quartiers_id',
		'users_id'
	];

	public function quartier()
	{
		return $this->belongsTo(\App\Quartier::class, 'quartiers_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
