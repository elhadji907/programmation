<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Jun 2021 19:22:35 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class TypesDirection
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $directions
 *
 * @package App
 */
class TypesDirection extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function directions()
	{
		return $this->hasMany(\App\Direction::class, 'types_directions_id');
	}
}