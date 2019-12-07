<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Profile
 * 
 * @property int $id
 * @property string $uuid
 * @property string $titre
 * @property string $description
 * @property string $url
 * @property string $image
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 *
 * @package App
 */
class Profile extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'titre',
		'description',
		'url',
		'image',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
