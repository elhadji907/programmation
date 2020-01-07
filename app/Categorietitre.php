<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Jan 2020 10:12:47 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Categorietitre
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Categorietitre extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'categorietitres_id');
	}
}
