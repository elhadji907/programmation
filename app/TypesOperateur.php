<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 04 Aug 2021 14:56:08 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TypesOperateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $categorie
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class TypesOperateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'categorie'
	];

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'types_operateurs_id');
	}
}
