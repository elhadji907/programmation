<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string $uuid
 * @property string $content
 * @property int $commentable_id
 * @property string $commentable_type
 * @property int $users_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\User $user
 *
 * @package App
 */
class Comment extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'commentable_id' => 'int',
		'users_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'content',
		'commentable_id',
		'commentable_type',
		'users_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function commentable()
	{
		return $this->morphTo();
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'Commentable')->latest();
	}
}
