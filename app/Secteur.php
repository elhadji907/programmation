<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Secteur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
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
		'name'
	];

	public function domaines()
	{
		return $this->hasMany(\App\Domaine::class, 'secteurs_id');
	}
}
