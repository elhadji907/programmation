<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 04 Jul 2021 13:16:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Commen
 * 
 * @property int $id
 * @property string $uuid
 * @property string $content
 * @property int $commentable_id
 * @property string $commentable_type
 * @property \Carbon\Carbon $cread_at
 * @property int $users_id
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Formation $formation
 * @property \App\User $user
 *
 * @package App
 */
class Commen extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'commentable_id' => 'int',
		'users_id' => 'int',
		'formations_id' => 'int'
	];

	protected $dates = [
		'cread_at'
	];

	protected $fillable = [
		'uuid',
		'content',
		'commentable_id',
		'commentable_type',
		'cread_at',
		'users_id',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
