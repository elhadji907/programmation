<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class CourriersHasImputation
 * 
 * @property int $id
 * @property int $courriers_id
 * @property int $imputations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Imputation $imputation
 *
 * @package App
 */
class CourriersHasImputation extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'courriers_id' => 'int',
		'imputations_id' => 'int'
	];

	protected $fillable = [
		'courriers_id',
		'imputations_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function imputation()
	{
		return $this->belongsTo(\App\Imputation::class, 'imputations_id');
	}
}
