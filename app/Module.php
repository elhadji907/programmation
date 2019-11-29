<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 29 Nov 2019 12:31:45 +0000.
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
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \Illuminate\Database\Eloquent\Collection $formes
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'domaines_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'domaines_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function formes()
	{
		return $this->belongsToMany(\App\Forme::class, 'formesmodules', 'modules_id', 'formes_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
