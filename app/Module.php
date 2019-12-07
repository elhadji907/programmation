<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 14:04:01 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $domaines_id
 * @property int $qualifications_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \App\Qualification $qualification
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $formes
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'domaines_id' => 'int',
		'qualifications_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'domaines_id',
		'qualifications_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function qualification()
	{
		return $this->belongsTo(\App\Qualification::class, 'qualifications_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'modules_id');
	}

	public function formes()
	{
		return $this->belongsToMany(\App\Forme::class, 'formesmodules', 'modules_id', 'formes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'operateursmodules', 'modules_id', 'operateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
