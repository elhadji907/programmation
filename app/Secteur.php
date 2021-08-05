<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 11:32:33 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Secteur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 *
 * @package App
 */
class Secteur extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'description'
	];

	public function domaines()
	{
		return $this->hasMany(\App\Domaine::class, 'secteurs_id');
	}
}
