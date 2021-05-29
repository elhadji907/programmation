<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeesHasAntenne
 * 
 * @property int $id
 * @property int $employees_id
 * @property int $antennes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Antenne $antenne
 * @property \App\Employee $employee
 *
 * @package App
 */
class EmployeesHasAntenne extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'employees_id' => 'int',
		'antennes_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'antennes_id'
	];

	public function antenne()
	{
		return $this->belongsTo(\App\Antenne::class, 'antennes_id');
	}

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
