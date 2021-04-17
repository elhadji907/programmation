<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Division
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Direction $direction
 * @property \Illuminate\Database\Eloquent\Collection $bureaus
 *
 * @package App
 */
class Division extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'directions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'directions_id'
	];

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function bureaus()
	{
		return $this->hasMany(\App\Bureau::class, 'divisions_id');
	}
}
