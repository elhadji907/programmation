<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CellulesHasEmployee
 * 
 * @property int $id
 * @property int $cellules_id
 * @property int $employees_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cellule $cellule
 * @property \App\Employee $employee
 *
 * @package App
 */
class CellulesHasEmployee extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'cellules_id' => 'int',
		'employees_id' => 'int'
	];

	protected $fillable = [
		'cellules_id',
		'employees_id'
	];

	public function cellule()
	{
		return $this->belongsTo(\App\Cellule::class, 'cellules_id');
	}

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
