<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Forme
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $beneficiaires_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Beneficiaire $beneficiaire
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Forme extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'beneficiaires_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'beneficiaires_id'
	];

	public function beneficiaire()
	{
		return $this->belongsTo(\App\Beneficiaire::class, 'beneficiaires_id');
	}

	public function evaluations()
	{
		return $this->hasMany(\App\Evaluation::class, 'formes_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'formesmodules', 'formes_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
