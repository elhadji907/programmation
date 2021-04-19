<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class AgrementsType
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $agrements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agrement $agrement
 *
 * @package App
 */
class AgrementsType extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'agrements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'agrements_id'
	];

	public function agrement()
	{
		return $this->belongsTo(\App\Agrement::class, 'agrements_id');
	}
}
