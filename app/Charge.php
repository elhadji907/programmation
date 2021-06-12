<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 Jun 2021 13:53:33 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Charge
 * 
 * @property int $id
 * @property string $uuid
 * @property string $etablissement
 * @property string $designation
 * @property string $observations
 * @property \Carbon\Carbon $date
 * @property int $employees_id
 * @property string $employees_matricule
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 *
 * @package App
 */
class Charge extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'etablissement',
		'designation',
		'observations',
		'date',
		'employees_id',
		'employees_matricule'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
