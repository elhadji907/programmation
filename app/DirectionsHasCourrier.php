<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class DirectionsHasCourrier
 * 
 * @property int $id
 * @property int $directions_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Direction $direction
 *
 * @package App
 */
class DirectionsHasCourrier extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'directions_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'directions_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}
}
