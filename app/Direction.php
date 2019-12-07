<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
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
 * @property int $types_directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\TypesDirection $types_direction
 * @property \Illuminate\Database\Eloquent\Collection $antennes
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $personnels
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App
 */
class Direction extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'chef_id' => 'int',
		'types_directions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'chef_id',
		'types_directions_id'
	];

	public function types_direction()
	{
		return $this->belongsTo(\App\TypesDirection::class, 'types_directions_id');
	}

	public function antennes()
	{
		return $this->hasMany(\App\Antenne::class, 'directions_id');
	}

	public function courriers()
	{
		return $this->belongsToMany(\App\Courrier::class, 'courriersdirections', 'directions_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function personnels()
	{
		return $this->hasMany(\App\Personnel::class, 'directions_id');
	}

	public function users()
	{
		return $this->hasMany(\App\User::class, 'directions_id');
	}
}
