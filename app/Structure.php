<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Feb 2020 12:24:07 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Structure
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Structure extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'structures_id');
	}
}
