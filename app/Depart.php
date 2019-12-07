<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Depart
 * 
 * @property int $id
 * @property string $uuid
 * @property int $courriers_id
 * @property string $destinataire
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 *
 * @package App
 */
class Depart extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'courriers_id',
		'destinataire'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}
}
