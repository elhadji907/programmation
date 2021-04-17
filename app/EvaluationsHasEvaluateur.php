<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EvaluationsHasEvaluateur
 * 
 * @property int $evaluations_id
 * @property int $evaluateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Evaluateur $evaluateur
 * @property \App\Evaluation $evaluation
 *
 * @package App
 */
class EvaluationsHasEvaluateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'evaluations_id';

	protected $casts = [
		'evaluateurs_id' => 'int'
	];

	protected $fillable = [
		'evaluateurs_id'
	];

	public function evaluateur()
	{
		return $this->belongsTo(\App\Evaluateur::class, 'evaluateurs_id');
	}

	public function evaluation()
	{
		return $this->belongsTo(\App\Evaluation::class, 'evaluations_id');
	}
}
