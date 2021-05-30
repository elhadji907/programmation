<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 01:09:32 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Fonction
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App
 */
class Fonction extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $fillable = [
		'uuid',
		'name',
		'sigle'
	];

	public function employees()
	{
		return $this->hasMany(\App\Employee::class, 'fonctions_id');
	}
}
