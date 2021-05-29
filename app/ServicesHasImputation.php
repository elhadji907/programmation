<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ServicesHasImputation
 * 
 * @property int $id
 * @property int $services_id
 * @property int $imputations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Imputation $imputation
 * @property \App\Service $service
 *
 * @package App
 */
class ServicesHasImputation extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'services_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $fillable = [
		'services_id',
		'imputations_id'
	];

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
	}

	public function service()
	{
		return $this->belongsTo(\App\Service::class, 'services_id');
	}
}
