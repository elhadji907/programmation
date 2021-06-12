<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class FormationsHasEvaluation
 * 
 * @property int $id
 * @property int $formations_id
 * @property int $evaluations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Evaluation $evaluation
 * @property \App\Formation $formation
 *
 * @package App
 */
class FormationsHasEvaluation extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'formations_id' => 'int',
		'evaluations_id' => 'int'
	];

	protected $fillable = [
		'formations_id',
		'evaluations_id'
	];

	public function evaluation()
	{
		return $this->belongsTo(\App\Evaluation::class, 'evaluations_id');
	}

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}
}
