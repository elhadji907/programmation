<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Apr 2021 11:19:21 +0000.
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
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

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
