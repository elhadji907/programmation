<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Imputation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $destinataire
 * @property string $sigle
 * @property \Carbon\Carbon $date
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App
 */
class Imputation extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'destinataire',
		'sigle',
		'date'
	];

	public function courriers()
	{
		return $this->belongsToMany(\App\Courrier::class, 'courriers_has_imputations', 'imputations_id', 'courriers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function directions()
	{
		return $this->belongsToMany(\App\Direction::class, 'directions_has_imputations', 'imputations_id', 'directions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function employees()
	{
		return $this->belongsToMany(\App\Employee::class, 'employees_has_imputations', 'imputations_id', 'employees_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(\App\User::class, 'users_has_imputations', 'imputations_id', 'users_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
