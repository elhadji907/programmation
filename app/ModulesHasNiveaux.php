<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ModulesHasNiveaux
 * 
 * @property int $id
 * @property int $modules_id
 * @property int $niveauxs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Module $module
 * @property \App\Niveaux $niveaux
 *
 * @package App
 */
class ModulesHasNiveaux extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'modules_has_niveauxs';

	protected $casts = [
		'modules_id' => 'int',
		'niveauxs_id' => 'int'
	];

	protected $fillable = [
		'modules_id',
		'niveauxs_id'
	];

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}

	public function niveaux()
	{
		return $this->belongsTo(\App\Niveaux::class, 'niveauxs_id');
	}
}
