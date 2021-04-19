<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Comptable
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property int $users_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $reglements
 *
 * @package App
 */
class Comptable extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function reglements()
	{
		return $this->hasMany(\App\Reglement::class, 'comptables_id');
	}
}
