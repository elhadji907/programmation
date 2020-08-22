<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Aug 2020 21:41:52 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Programmesmodule
 * 
 * @property int $id
 * @property int $programmes_id
 * @property int $modules_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Module $module
 * @property \App\Programme $programme
 *
 * @package App
 */
class Programmesmodule extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'programmes_id' => 'int',
		'modules_id' => 'int'
	];

	protected $fillable = [
		'programmes_id',
		'modules_id'
	];

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}
}
