<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Nov 2019 16:15:50 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CourriersHasDirection
 * 
 * @property int $id
 * @property int $courriers_id
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Direction $direction
 *
 * @package App
 */
class Courriersdirection extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'courriers_id' => 'int',
		'directions_id' => 'int'
	];

	protected $fillable = [
		'courriers_id',
		'directions_id'
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
