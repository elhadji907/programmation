<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Personnel
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property int $nbrefant
 * @property int $users_id
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Direction $direction
 * @property \App\User $user
 *
 * @package App
 */
class Personnel extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'nbrefant' => 'int',
		'users_id' => 'int',
		'directions_id' => 'int'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'debut',
		'fin',
		'nbrefant',
		'users_id',
		'directions_id'
	];

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
