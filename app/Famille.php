<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 Jun 2021 13:53:41 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Famille
 * 
 * @property int $id
 * @property string $uuid
 * @property string $civilite
 * @property string $prenom
 * @property string $nom
 * @property \Carbon\Carbon $date
 * @property string $lieu
 * @property string $status
 * @property string $adresse
 * @property string $telephone
 * @property string $email
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
class Famille extends Eloquent
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
		'civilite',
		'prenom',
		'nom',
		'date',
		'lieu',
		'status',
		'adresse',
		'telephone',
		'email',
		'employees_id',
		'employees_matricule'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
