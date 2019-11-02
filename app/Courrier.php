<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Oct 2019 15:40:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Courrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $objet
 * @property string $expediteur
 * @property string $adresse
 * @property string $fax
 * @property string $bp
 * @property string $type
 * @property string $message
 * @property string $imputation
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
 * @property \Illuminate\Database\Eloquent\Collection $directions
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
		'objet',
		'expediteur',
		'telephone',
		'email',
		'adresse',
		'fax',
		'bp',
		'type',
		'message',
		'imputation',
		'file',
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

	public function directions()
	{
		return $this->belongsToMany(\App\Direction::class, 'courriers_has_directions', 'courriers_id', 'directions_id')
					->withPivot('deleted_at')
					->withTimestamps();
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
