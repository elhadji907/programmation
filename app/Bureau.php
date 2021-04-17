<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
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
