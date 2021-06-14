<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Activite
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $lieu
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $depenses
 *
 * @package App
 */
class Activite extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'lieu'
	];

	public function depenses()
	{
		return $this->hasMany(\App\Depense::class, 'activites_id');
	}
}
