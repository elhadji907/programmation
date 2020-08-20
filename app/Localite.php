<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 19 Aug 2020 13:50:04 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Localite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $programmes
 *
 * @package App
 */
class Localite extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function programmes()
	{
		return $this->belongsToMany(\App\Programme::class, 'programmeslocalites', 'localites_id', 'programmes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
