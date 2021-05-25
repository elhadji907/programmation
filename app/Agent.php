<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Agent
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property int $employees_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Agent extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'agents_id');
	}
}
