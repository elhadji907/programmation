<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeesHasDirection
 * 
 * @property int $employees_id
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Direction $direction
 * @property \App\Employee $employee
 *
 * @package App
 */
class EmployeesHasDirection extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'employees_id';

	protected $casts = [
		'directions_id' => 'int'
	];

	protected $fillable = [
		'directions_id'
	];

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
