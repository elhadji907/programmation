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
 * Class Category
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $salaires
 *
 * @package App
 */
class Category extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $fillable = [
		'uuid',
		'name'
	];

	public function employees()
	{
		return $this->hasMany(\App\Employee::class, 'categories_id');
	}

	public function salaires()
	{
		return $this->hasMany(\App\Salaire::class, 'categories_id');
	}
}
