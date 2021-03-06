<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Evaluateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $telephone
 * @property string $email
 * @property string $adresse
 * @property \Carbon\Carbon $date
 * @property string $fonction
 * @property string $appreciation
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 *
 * @package App
 */
class Evaluateur extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'name',
		'telephone',
		'email',
		'adresse',
		'date',
		'fonction',
		'appreciation'
	];

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'evaluateurs_has_modules', 'evaluateurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function evaluations()
	{
		return $this->belongsToMany(\App\Evaluation::class, 'evaluations_has_evaluateurs', 'evaluateurs_id', 'evaluations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
