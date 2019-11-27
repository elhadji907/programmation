<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formes
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function formes()
	{
		return $this->belongsToMany(\App\Forme::class, 'formesmodules', 'modules_id', 'formes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function domaines()
	{
		return $this->belongsToMany(\App\Domaine::class, 'modulesdomaines', 'modules_id', 'domaines_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
