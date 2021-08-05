<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Jul 2021 12:39:24 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ModulesHasAgrement
 * 
 * @property int $id
 * @property int $modules_id
 * @property int $agrements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Agrement $agrement
 * @property \App\Module $module
 *
 * @package App
 */
class ModulesHasAgrement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'modules_id' => 'int',
		'agrements_id' => 'int'
	];

	protected $fillable = [
		'modules_id',
		'agrements_id'
	];

	public function agrement()
	{
		return $this->belongsTo(\App\Agrement::class, 'agrements_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}
}
