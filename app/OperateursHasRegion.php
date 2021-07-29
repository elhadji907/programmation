<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Jul 2021 10:41:28 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class OperateursHasRegion
 * 
 * @property int $id
 * @property int $operateurs_id
 * @property int $regions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Operateur $operateur
 * @property \App\Region $region
 *
 * @package App
 */
class OperateursHasRegion extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'operateurs_id' => 'int',
		'regions_id' => 'int'
	];

	protected $fillable = [
		'operateurs_id',
		'regions_id'
	];

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}

	public function region()
	{
		return $this->belongsTo(\App\Region::class, 'regions_id');
	}
}
