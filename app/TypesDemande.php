<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 07 Jul 2021 14:04:34 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TypesDemande
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $categorie
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class TypesDemande extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'categorie'
	];

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class, 'types_demandes_id');
	}
}
