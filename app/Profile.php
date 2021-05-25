<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
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
	use \App\Helpers\UuidForKey;
	

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

	public function getImage(){
		$imagePath = $this->image ?? 'avatars/default.png';
		return "/storage/" . $imagePath;
	}
}
