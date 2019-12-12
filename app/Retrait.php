<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Retrait
 * 
 * @property int $id
 * @property string $uuid
 * @property string $cin
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property \Carbon\Carbon $date
 * @property int $evaluations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Evaluation $evaluation
 *
 * @package App
 */
class Retrait extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'evaluations_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'cin',
		'firstname',
		'lastname',
		'email',
		'telephone',
		'date',
		'evaluations_id'
	];

	public function evaluation()
	{
		return $this->belongsTo(\App\Evaluation::class, 'evaluations_id');
	}
}
