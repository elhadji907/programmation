<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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
 * @property string $sexe
 * @property \Carbon\Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $situation_familiale
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $created_by
 * @property string $updated_by
 * @property string $deleted_by
 * @property int $roles_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $agents
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $comptables
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $postes
 * @property \Illuminate\Database\Eloquent\Collection $profiles
 *
 * @package App
 */
class User extends Eloquent
{
<<<<<<< HEAD
	
	use Notifiable;
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'roles_id' => 'int'
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
		'sexe',
		'date_naissance',
		'lieu_naissance',
		'situation_familiale',
		'email_verified_at',
		'password',
<<<<<<< HEAD
		'created_by',
		'updated_by',
		'deleted_by',
		'roles_id'
	];


	/**
	 * 
	 */

	protected static function boot(){
		parent::boot();
		static::created(function ($user){
			$user->profile()->create([
				'titre'	=>	'',
				'description'	=>	'',
				'url'	=>	''
			]);
		});
	} 

	public function getRouteKeyName()
	{
		return 'username';
	}

	/** gestion des roles */
	public function hasRole($roleName)
	{
		return $this->role->name === $roleName;
	}	
	public function hasAnyRoles($roles)
	{
		return in_array($this->role->name, $roles);
	}	
	public function isAdmin(){
		return false;
	}

	/**
	 * 
	 */

=======
		'roles_id'
	];

>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function administrateurs()
	{
		return $this->hasMany(\App\Administrateur::class, 'users_id');
	}

<<<<<<< HEAD
	public function agent()
	{
		return $this->hasOne(\App\Agent::class, 'users_id')->orderBy('created_at', 'DESC');
	}

	public function beneficiaire()
=======
	public function agents()
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	{
		return $this->hasMany(\App\Agent::class, 'users_id');
	}

<<<<<<< HEAD
	public function comptable()
	{
		return $this->hasOne(\App\Comptable::class, 'users_id')->orderBy('created_at', 'DESC');
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'users_id')->orderBy('created_at', 'DESC');
	}

	public function demandeur()
=======
	public function beneficiaires()
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	{
		return $this->hasMany(\App\Beneficiaire::class, 'users_id');
	}

<<<<<<< HEAD
	public function employee()
	{
		return $this->hasOne(\App\Employee::class, 'users_id')->orderBy('created_at', 'DESC');
=======
	public function comptables()
	{
		return $this->hasMany(\App\Comptable::class, 'users_id');
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	}

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'users_id');
	}

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class, 'users_id');
	}

<<<<<<< HEAD
	public function postes()
	{
		return $this->hasMany(\App\Poste::class, 'users_id')->orderBy('created_at', 'DESC');
=======
	public function employees()
	{
		return $this->hasMany(\App\Employee::class, 'users_id');
	}

	public function gestionnaires()
	{
		return $this->hasMany(\App\Gestionnaire::class, 'users_id');
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	}

	public function operateurs()
	{
<<<<<<< HEAD
		return $this->hasOne(\App\Profile::class, 'users_id')->orderBy('created_at', 'DESC');
=======
		return $this->hasMany(\App\Operateur::class, 'users_id');
	}

	public function postes()
	{
		return $this->hasMany(\App\Poste::class, 'users_id');
	}

	public function profiles()
	{
		return $this->hasMany(\App\Profile::class, 'users_id');
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	}
}
