<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Agrement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $name
 * @property string $ninea
 * @property string $adresse
 * @property string $bp
 * @property string $email
 * @property string $prenom
 * @property string $nom
 * @property string $region
 * @property string $departement
 * @property string $commune
 * @property string $type
 * @property string $details
 * @property int $gestionnaires_id
 * @property int $operateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\Operateur $operateur
 * @property \Illuminate\Database\Eloquent\Collection $agrements_types
 *
 * @package App
 */
class Agrement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'gestionnaires_id' => 'int',
		'operateurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'ninea',
		'adresse',
		'bp',
		'email',
		'prenom',
		'nom',
		'region',
		'departement',
		'commune',
		'type',
		'details',
		'gestionnaires_id',
		'operateurs_id'
	];

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}

	public function agrements_types()
	{
		return $this->hasMany(\App\AgrementsType::class, 'agrements_id');
	}
}
