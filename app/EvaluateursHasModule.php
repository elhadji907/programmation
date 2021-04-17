<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EvaluateursHasModule
 * 
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
	protected $primaryKey = 'evaluateurs_id';

	protected $casts = [
		'modules_id' => 'int'
	];

	protected $fillable = [
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
