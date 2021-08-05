<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 11:31:16 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CollectivesHasFormation
 * 
 * @property int $id
 * @property int $collectives_id
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Collective $collective
 * @property \App\Formation $formation
 *
 * @package App
 */
class CollectivesHasFormation extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'collectives_id' => 'int',
		'formations_id' => 'int'
	];

	protected $fillable = [
		'collectives_id',
		'formations_id'
	];

	public function collective()
	{
		return $this->belongsTo(\App\Collective::class, 'collectives_id');
	}

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}
}
