<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 13:51:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TypesFormation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $categorie
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class TypesFormation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'categorie'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'types_formations_id');
	}
}
