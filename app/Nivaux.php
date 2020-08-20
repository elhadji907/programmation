<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 20 Aug 2020 13:41:48 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Nivaux
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Nivaux extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'nivauxs';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'nivauxs_id');
	}

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeursnivauxs', 'nivauxs_id', 'demandeurs_id')
					->withPivot('id', 'update_at', 'deleted_at');
	}
}
