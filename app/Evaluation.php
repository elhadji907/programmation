<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $retraits
 *
 * @package App
 */
class Evaluation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

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

	public function retraits()
	{
		return $this->hasMany(\App\Retrait::class, 'evaluations_id');
	}
}
