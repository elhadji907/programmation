<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Convention
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property \Carbon\Carbon $date
 * @property string $items1
 * @property string $items2
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Convention extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'date',
		'items1',
		'items2'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'conventions_id');
	}
}
