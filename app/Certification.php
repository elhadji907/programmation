<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\Helpers\UuidForKey;

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
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Certification extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function evaluations()
	{
		return $this->hasMany(\App\Evaluation::class, 'certifications_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'certifications_id');
	}
}
