<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CellulesHasEmployee
 * 
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
	
	protected $primaryKey = 'cellules_id';

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $fillable = [
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
