<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/ProgrammesHasRegion.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/ProgrammesHasRegion.php
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
<<<<<<< HEAD:app/ProgrammesHasRegion.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/ProgrammesHasRegion.php
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
