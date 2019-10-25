<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Oct 2019 15:40:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CourriersHasDirection
 * 
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
class CourriersHasDirection extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $primaryKey = 'courriers_id';

	protected $casts = [
		'directions_id' => 'int'
	];

	protected $fillable = [
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
