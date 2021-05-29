<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Liste
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property int $bordereaus_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Bordereau $bordereau
 *
 * @package App
 */
class Liste extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'bordereaus_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'bordereaus_id'
	];

	public function bordereau()
	{
		return $this->belongsTo(\App\Bordereau::class, 'bordereaus_id');
	}
}
