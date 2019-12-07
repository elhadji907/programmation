<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $uuid
 * @property string $civilite
 * @property string $firstname
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $telephone
 * @property \Carbon\Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $situation_familiale
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property int $roles_id
 * @property int $directions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Direction $direction
 * @property \App\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $evaluateurs
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $personnels
 * @property \Illuminate\Database\Eloquent\Collection $postes
 * @property \Illuminate\Database\Eloquent\Collection $profiles
 *
 * @package App
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'roles_id' => 'int',
		'directions_id' => 'int'
	];

	protected $dates = [
		'date_naissance',
		'email_verified_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'uuid',
		'civilite',
		'firstname',
		'name',
		'username',
		'email',
		'telephone',
		'date_naissance',
		'lieu_naissance',
		'situation_familiale',
		'email_verified_at',
		'password',
		'roles_id',
		'directions_id'
	];

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function administrateurs()
	{
		return $this->hasMany(\App\Administrateur::class, 'users_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'users_id');
	}

	public function evaluateurs()
	{
		return $this->hasMany(\App\Evaluateur::class, 'users_id');
	}

	public function gestionnaires()
	{
		return $this->hasMany(\App\Gestionnaire::class, 'users_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'users_id');
	}

	public function personnels()
	{
		return $this->hasMany(\App\Personnel::class, 'users_id');
	}

	public function postes()
	{
		return $this->hasMany(\App\Poste::class, 'users_id');
	}

	public function profiles()
	{
		return $this->hasMany(\App\Profile::class, 'users_id');
	}
}
