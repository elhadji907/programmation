<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Detf
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Formation $formation
 *
 * @package App
 */
class Detf extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'formations_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}
}
