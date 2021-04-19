<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Projet
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $dafs
 *
 * @package App
 */
class Projet extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'name',
		'sigle'
	];

	public function dafs()
	{
		return $this->hasMany(\App\Daf::class, 'projets_id');
	}
}
