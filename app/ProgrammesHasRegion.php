<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ProgrammesHasRegion
 * 
 * @property int $programmes_id
 * @property int $regions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Programme $programme
 * @property \App\Region $region
 *
 * @package App
 */
class ProgrammesHasRegion extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'programmes_id';

	protected $casts = [
		'regions_id' => 'int'
	];

	protected $fillable = [
		'regions_id'
	];

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}

	public function region()
	{
		return $this->belongsTo(\App\Region::class, 'regions_id');
	}
}
