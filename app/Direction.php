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
 * Class Direction
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $courriers_id
<<<<<<< HEAD
 * @property int $types_directions_id
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
<<<<<<< HEAD
 * @property \App\TypesDirection $types_direction
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 * @property \Illuminate\Database\Eloquent\Collection $divisions
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Direction extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'courriers_id' => 'int',
		'types_directions_id' => 'int'
=======

	protected $casts = [
		'courriers_id' => 'int'
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
<<<<<<< HEAD
		'courriers_id',
		'types_directions_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function types_direction()
	{
		return $this->belongsTo(\App\TypesDirection::class, 'types_directions_id');
	}

	public function divisions()
	{
		return $this->hasMany(\App\Division::class, 'directions_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_directions', 'directions_id', 'employees_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
=======
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function divisions()
	{
		return $this->hasMany(\App\Division::class, 'directions_id');
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_directions', 'directions_id', 'employees_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
}
