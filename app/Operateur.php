<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Operateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $numero
 * @property string $name
 * @property string $ninea
 * @property string $email
 * @property string $telephone
 * @property string $registre
 * @property string $quitus
 * @property string $status
 * @property string $agreer
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property int $users_id
 * @property int $structures_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Structure $structure
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Operateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'users_id' => 'int',
		'structures_id' => 'int'
	];

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'numero',
		'name',
		'ninea',
		'email',
		'telephone',
		'registre',
		'quitus',
		'status',
		'agreer',
		'date_debut',
		'date_fin',
		'users_id',
		'structures_id'
	];

	public function structure()
	{
		return $this->belongsTo(\App\Structure::class, 'structures_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'operateurs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'operateursmodules', 'operateurs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
