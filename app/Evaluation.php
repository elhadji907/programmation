<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * Class Evaluation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $note
 * @property int $formes_id
 * @property int $certifications_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Certification $certification
 * @property \App\Forme $forme
 *
 * @package App
 */
class Evaluation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'formes_id' => 'int',
		'certifications_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'note',
		'formes_id',
		'certifications_id'
	];

	public function certification()
	{
		return $this->belongsTo(\App\Certification::class, 'certifications_id');
	}

	public function forme()
	{
		return $this->belongsTo(\App\Forme::class, 'formes_id');
	}
}
