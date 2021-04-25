<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Apr 2021 18:20:18 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $evaluateurs
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $programmes
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

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeurs_has_modules', 'modules_id', 'demandeurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function evaluateurs()
	{
		return $this->belongsToMany(\App\Evaluateur::class, 'evaluateurs_has_modules', 'modules_id', 'evaluateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function operateurs()
	{
		return $this->belongsToMany(\App\Operateur::class, 'modules_has_operateurs', 'modules_id', 'operateurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function programmes()
	{
		return $this->belongsToMany(\App\Programme::class, 'programmes_has_modules', 'modules_id', 'programmes_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
