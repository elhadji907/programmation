<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Evaluateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Evaluateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'formationsevaluateurs', 'evaluateurs_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
