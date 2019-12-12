<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Programme
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property int $effectif
 * @property int $courriers_id
 * @property int $demandeformations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Demandeur $demandeur
 *
 * @package App
 */
class Programme extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'effectif' => 'int',
		'courriers_id' => 'int',
		'demandeformations_id' => 'int'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'uuid',
		'name',
		'debut',
		'fin',
		'effectif',
		'courriers_id',
		'demandeformations_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeformations_id');
	}
}
