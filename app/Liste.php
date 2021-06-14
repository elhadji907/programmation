<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Liste
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $destinataire
 * @property \Carbon\Carbon $date
 * @property string $name
 * @property string $liste
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

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'destinataire',
		'date',
		'name',
		'liste'
	];

	public function bordereaus()
	{
		return $this->hasMany(\App\Bordereau::class, 'listes_id');
	}
}
