<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Interne
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 *
 * @package App
 */
class Interne extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}
}
