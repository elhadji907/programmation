<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 12 Jul 2021 14:28:34 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Findividuelle
 * 
 * @property int $id
 * @property string $uuid
 * @property string $code
 * @property string $categorie
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Formation $formation
 *
 * @package App
 */
class Findividuelle extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'formations_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'code',
		'categorie',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}
}
