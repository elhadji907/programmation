<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Certification
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 *
 * @package App
 */
class Certification extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function evaluations()
	{
		return $this->hasMany(\App\Evaluation::class, 'certifications_id');
	}
}
