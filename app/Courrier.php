<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 10 Oct 2019 14:26:09 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Courrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property string $types
 * @property string $message
 * @property string $destinataire
 * @property string $fichier
 * @property string $statut
 * @property \Carbon\Carbon $date
 * @property int $types_courriers_id
 * @property int $gestionnaires_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\TypesCourrier $types_courrier
 * @property \Illuminate\Database\Eloquent\Collection $departs
 * @property \Illuminate\Database\Eloquent\Collection $internes
 * @property \Illuminate\Database\Eloquent\Collection $recues
 *
 * @package App
 */
class Courrier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'types_courriers_id' => 'int',
		'gestionnaires_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'types',
		'message',
		'destinataire',
		'fichier',
		'statut',
		'date',
		'types_courriers_id',
		'gestionnaires_id'
	];

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function types_courrier()
	{
		return $this->belongsTo(\App\TypesCourrier::class, 'types_courriers_id');
	}

	public function departs()
	{
		return $this->hasMany(\App\Depart::class, 'courriers_id');
	}

	public function internes()
	{
		return $this->hasMany(\App\Interne::class, 'courriers_id');
	}

	public function recues()
	{
		return $this->hasMany(\App\Recue::class, 'courriers_id');
	}
}
