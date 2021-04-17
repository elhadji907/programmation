<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ModulesHasOperateur
 * 
 * @property int $modules_id
 * @property int $operateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Module $module
 * @property \App\Operateur $operateur
 *
 * @package App
 */
class ModulesHasOperateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'modules_id';

	protected $casts = [
		'operateurs_id' => 'int'
	];

	protected $fillable = [
		'operateurs_id'
	];

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}
}
