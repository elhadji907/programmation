<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Evaluation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property \Carbon\Carbon $date
 * @property float $note
 * @property string $appreciation
 * @property string $mention
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $evaluateurs
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Evaluation extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'note' => 'float'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'date',
		'note',
		'appreciation',
		'mention'
	];

	public function evaluateurs()
	{
		return $this->belongsToMany(\App\Evaluateur::class, 'evaluations_has_evaluateurs', 'evaluations_id', 'evaluateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'formations_has_evaluations', 'evaluations_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
