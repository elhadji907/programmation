<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 22 Aug 2020 16:41:09 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Programme
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property int $effectif
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $localites
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Programme extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'effectif' => 'int'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'debut',
		'fin',
		'effectif'
	];

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class, 'programmes_id');
	}

	public function localites()
	{
		return $this->belongsToMany(\App\Localite::class, 'programmeslocalites', 'programmes_id', 'localites_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'programmesmodules', 'programmes_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
