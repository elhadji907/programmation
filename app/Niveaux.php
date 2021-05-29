<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Niveaux
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
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
class Niveaux extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'niveauxs';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'niveauxs_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_niveauxs', 'niveauxs_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'operateurs_has_niveaux', 'niveaux_id', 'operateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
