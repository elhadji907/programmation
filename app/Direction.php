<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Direction
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $chef_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App
 */
class Direction extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'chef_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'chef_id'
	];

	public function courriers()
	{
		return $this->belongsToMany(\App\Courrier::class, 'courriersdirections', 'directions_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function users()
	{
		return $this->hasMany(\App\User::class, 'directions_id');
	}
}
