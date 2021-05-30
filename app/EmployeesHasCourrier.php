<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeesHasCourrier
 * 
 * @property int $id
 * @property int $employees_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Employee $employee
 *
 * @package App
 */
class EmployeesHasCourrier extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'employees_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}