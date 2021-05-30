<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Specialite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Specialite extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $fillable = [
		'uuid',
		'name',
		'sigle'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'specialites_id');
	}

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'specialites_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'specialites_id');
	}
}
