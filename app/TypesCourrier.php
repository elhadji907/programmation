<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TypesCourrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $categorie
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courriers
 *
 * @package App
 */
class TypesCourrier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'categorie'
	];

	public function courriers()
	{
		return $this->hasMany(\App\Courrier::class, 'types_courriers_id');
	}
}
