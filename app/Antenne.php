<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Antenne
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $chef_id
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Direction $direction
 * @property \Illuminate\Database\Eloquent\Collection $regions
 *
 * @package App
 */
class Antenne extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'chef_id' => 'int',
		'directions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'chef_id',
		'directions_id'
	];

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function regions()
	{
		return $this->hasMany(\App\Region::class, 'antennes_id');
	}
}
