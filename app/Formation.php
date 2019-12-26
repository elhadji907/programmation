<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 25 Dec 2019 22:35:31 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $code
 * @property string $numero
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property int $modules_id
 * @property int $operateurs_id
 * @property int $categorietitres_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Categorietitre $categorietitre
 * @property \App\Module $module
 * @property \App\Operateur $operateur
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $conventions
 * @property \Illuminate\Database\Eloquent\Collection $detfs
 * @property \Illuminate\Database\Eloquent\Collection $evaluateurs
 * @property \Illuminate\Database\Eloquent\Collection $formes
 *
 * @package App
 */
class Formation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'modules_id' => 'int',
		'operateurs_id' => 'int',
		'categorietitres_id' => 'int'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'uuid',
		'code',
		'numero',
		'debut',
		'fin',
		'modules_id',
		'operateurs_id',
		'categorietitres_id'
	];

	public function categorietitre()
	{
		return $this->belongsTo(\App\Categorietitre::class, 'categorietitres_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiairesformations', 'formations_id', 'beneficiaires_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function conventions()
	{
		return $this->hasMany(\App\Convention::class, 'formations_id');
	}

	public function detfs()
	{
		return $this->hasMany(\App\Detf::class, 'formations_id');
	}

	public function evaluateurs()
	{
		return $this->belongsToMany(\App\Evaluateur::class, 'formationsevaluateurs', 'formations_id', 'evaluateurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function formes()
	{
		return $this->hasMany(\App\Forme::class, 'formations_id');
	}
}
