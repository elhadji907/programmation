<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $imputations
 * @property \Illuminate\Database\Eloquent\Collection $divisions
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Direction extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

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

	public function courriers()
	{
		return $this->belongsToMany(\App\Courrier::class, 'directions_has_courriers', 'directions_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function imputations()
	{
		return $this->belongsToMany(\App\Imputation::class, 'directions_has_imputations', 'directions_id', 'imputations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function divisions()
	{
		return $this->hasMany(\App\Division::class, 'directions_id');
	}

	public function employees()
	{
		return $this->hasMany(\App\Employee::class, 'directions_id');
	}
}
