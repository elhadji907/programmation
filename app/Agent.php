<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/Agent.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/Agent.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Agent
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
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Agent extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD:app/Agent.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/Agent.php

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

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'agents_id');
	}
}
