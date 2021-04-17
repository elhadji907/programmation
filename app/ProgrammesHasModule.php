<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ProgrammesHasModule
 * 
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
class ProgrammesHasModule extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'programmes_id';

	protected $casts = [
		'modules_id' => 'int'
	];

	protected $fillable = [
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
