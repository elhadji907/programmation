<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * Class Domaine
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Domaine extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiairesdomaines', 'domaines_id', 'beneficiaires_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modulesdomaines', 'domaines_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
