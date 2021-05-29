<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $courriers_id
 * @property int $imputations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Imputation $imputation
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $imputations
 *
 * @package App
 */
class Service extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'courriers_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'courriers_id',
		'imputations_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_services', 'services_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function imputations()
	{
		return $this->belongsToMany(\App\Imputation::class, 'services_has_imputations', 'services_id', 'imputations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
