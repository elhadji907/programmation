<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
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
	use \App\Helpers\UuidForKey;
	

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
