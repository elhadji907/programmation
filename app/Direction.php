<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
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
 * @property int $types_directions_id
 * @property int $imputations_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Imputation $imputation
 * @property \App\TypesDirection $types_direction
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
		'types_directions_id' => 'int',
		'imputations_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'types_directions_id',
		'imputations_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
	}

	public function types_direction()
	{
		return $this->belongsTo(\App\TypesDirection::class, 'types_directions_id');
	}

	public function divisions()
	{
		return $this->hasMany(\App\Division::class, 'directions_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_directions', 'directions_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
