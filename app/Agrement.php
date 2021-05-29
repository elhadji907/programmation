<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
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
 * @property string $rccm
 * @property string $quitus
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
 * @property int $responsables_id
 * @property int $quitus_id
 * @property int $rccms_id
 * @property int $nineas_id
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\Operateur $operateur
 * @property \App\Responsable $responsable
 * @property \Illuminate\Database\Eloquent\Collection $agrements_types
 *
 * @package App
 */
class Agrement extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'gestionnaires_id' => 'int',
		'operateurs_id' => 'int',
		'responsables_id' => 'int',
		'quitus_id' => 'int',
		'rccms_id' => 'int',
		'nineas_id' => 'int',
		'courriers_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'rccm',
		'quitus',
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
		'operateurs_id',
		'responsables_id',
		'quitus_id',
		'rccms_id',
		'nineas_id',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}

	public function ninea()
	{
		return $this->belongsTo(\App\Ninea::class, 'nineas_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}

	public function quitus()
	{
		return $this->belongsTo(\App\Quitus::class);
	}

	public function rccm()
	{
		return $this->belongsTo(\App\Rccm::class, 'rccms_id');
	}

	public function responsable()
	{
		return $this->belongsTo(\App\Responsable::class, 'responsables_id');
	}

	public function agrements_types()
	{
		return $this->hasMany(\App\AgrementsType::class, 'agrements_id');
	}
}
