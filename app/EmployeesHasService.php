<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EmployeesHasService
 * 
 * @property int $employees_id
 * @property int $services_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \App\Service $service
 *
 * @package App
 */
class EmployeesHasService extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	protected $primaryKey = 'employees_id';

	protected $casts = [
		'services_id' => 'int'
	];

	protected $fillable = [
		'services_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function service()
	{
		return $this->belongsTo(\App\Service::class, 'services_id');
	}
}
