<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Rccm
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property \Carbon\Carbon $date
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $agrements
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Rccm extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date'
	];

	public function agrements()
	{
		return $this->hasMany(\App\Agrement::class, 'rccms_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'rccms_id');
	}
}
