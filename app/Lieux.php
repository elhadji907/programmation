<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Apr 2021 18:20:18 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Lieux
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Lieux extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'lieuxs';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class);
	}
}
