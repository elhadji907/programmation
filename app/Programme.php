<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
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
 * @property string $duree
 * @property int $effectif
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $regions
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

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'duree',
		'effectif'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'programmes_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'programmes_has_modules', 'programmes_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function regions()
	{
		return $this->belongsToMany(\App\Region::class, 'programmes_has_regions', 'programmes_id', 'regions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
