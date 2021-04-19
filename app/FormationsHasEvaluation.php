<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/FormationsHasEvaluation.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/FormationsHasEvaluation.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class FormationsHasEvaluation
 * 
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
<<<<<<< HEAD:app/FormationsHasEvaluation.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/FormationsHasEvaluation.php
	protected $primaryKey = 'formations_id';

	protected $casts = [
		'evaluations_id' => 'int'
	];

	protected $fillable = [
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
