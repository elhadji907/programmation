<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Jun 2021 22:57:46 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Liste
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property string $sigle
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bordereaus
 *
 * @package App
 */
class Liste extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'sigle'
	];

	public function bordereaus()
	{
		return $this->hasMany(\App\Bordereau::class, 'listes_id');
	}
}
