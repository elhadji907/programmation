<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Antenne
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Antenne extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_antennes', 'antennes_id', 'employees_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
