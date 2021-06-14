<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:23 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ProgrammesHasRegion
 * 
 * @property int $id
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
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'programmes_id' => 'int',
		'regions_id' => 'int'
	];

	protected $fillable = [
		'programmes_id',
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
