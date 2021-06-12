<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Bureau
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $divisions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Division $division
 *
 * @package App
 */
class Bureau extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'divisions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'divisions_id'
	];

	public function division()
	{
		return $this->belongsTo(\App\Division::class, 'divisions_id');
	}
}
