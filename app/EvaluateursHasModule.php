<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EvaluateursHasModule
 * 
 * @property int $id
 * @property int $evaluateurs_id
 * @property int $modules_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Evaluateur $evaluateur
 * @property \App\Module $module
 *
 * @package App
 */
class EvaluateursHasModule extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'evaluateurs_id' => 'int',
		'modules_id' => 'int'
	];

	protected $fillable = [
		'evaluateurs_id',
		'modules_id'
	];

	public function evaluateur()
	{
		return $this->belongsTo(\App\Evaluateur::class, 'evaluateurs_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}
}
