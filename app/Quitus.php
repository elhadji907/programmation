<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:23 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Quitus
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
class Quitus extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	protected $table = 'quitus';

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
		return $this->hasMany(\App\Agrement::class);
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class);
	}
}
