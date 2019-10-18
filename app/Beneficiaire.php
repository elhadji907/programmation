<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Oct 2019 15:40:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Beneficiaire
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property int $users_id
 * @property int $villages_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 * @property \App\Village $village
 *
 * @package App
 */
class Beneficiaire extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'users_id' => 'int',
		'villages_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'users_id',
		'villages_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function village()
	{
		return $this->belongsTo(\App\Village::class, 'villages_id');
	}
}
