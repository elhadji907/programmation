<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:21 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $departements
 *
 * @package App
 */
class Region extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'nom'
	];

	public function departements()
	{
		return $this->hasMany(\App\Departement::class, 'regions_id');
	}
}
