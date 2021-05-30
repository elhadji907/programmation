<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
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
 * @property int $chef_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Imputation $imputation
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
		'types_directions_id' => 'int',
		'imputations_id' => 'int',
		'courriers_id' => 'int',
		'chef_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'types_directions_id',
		'imputations_id',
		'courriers_id',
		'chef_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
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
