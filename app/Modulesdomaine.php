<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Modulesdomaine
 * 
 * @property int $id
 * @property int $modules_id
 * @property int $domaines_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \App\Module $module
 *
 * @package App
 */
class Modulesdomaine extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'modules_id' => 'int',
		'domaines_id' => 'int'
	];

	protected $fillable = [
		'modules_id',
		'domaines_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}
}
