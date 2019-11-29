<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 29 Nov 2019 12:31:45 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Formesmodule
 * 
 * @property int $id
 * @property int $formes_id
 * @property int $modules_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Forme $forme
 * @property \App\Module $module
 *
 * @package App
 */
class Formesmodule extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'formes_id' => 'int',
		'modules_id' => 'int'
	];

	protected $fillable = [
		'formes_id',
		'modules_id'
	];

	public function forme()
	{
		return $this->belongsTo(\App\Forme::class, 'formes_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}
}
