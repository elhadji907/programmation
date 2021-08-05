<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Jul 2021 10:46:29 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ModulesHasDepartement
 * 
 * @property int $id
 * @property int $modules_id
 * @property int $departements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Departement $departement
 * @property \App\Module $module
 *
 * @package App
 */
class ModulesHasDepartement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'modules_id' => 'int',
		'departements_id' => 'int'
	];

	protected $fillable = [
		'modules_id',
		'departements_id'
	];

	public function departement()
	{
		return $this->belongsTo(\App\Departement::class, 'departements_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}
}
