<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Detail
 * 
 * @property int $id
 * @property string $uuid
 * @property string $observations
 * @property string $motif
 * @property string $name
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Formation $formation
 *
 * @package App
 */
class Detail extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'formations_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'observations',
		'motif',
		'name',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}
}
