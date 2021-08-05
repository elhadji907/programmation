<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Jul 2021 10:40:59 +0000.
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
 * @property string $sigle
 * @property string $rccm
 * @property string $quitus
 * @property string $ninea
 * @property string $adresse
 * @property string $email
 * @property string $telephone
 * @property string $fixe
 * @property string $bp
 * @property string $fax
 * @property string $prenom_responsable
 * @property string $nom_responsable
 * @property string $email_responsable
 * @property string $telephone_responsabel
 * @property string $type
 * @property string $details
 * @property int $gestionnaires_id
 * @property int $operateurs_id
 * @property int $quitus_id
 * @property int $rccms_id
 * @property int $nineas_id
 * @property int $courriers_id
 * @property int $departements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \App\Departement $departement
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\Operateur $operateur
 * @property \Illuminate\Database\Eloquent\Collection $agrements_types
 * @property \Illuminate\Database\Eloquent\Collection $modules
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
		'quitus_id' => 'int',
		'rccms_id' => 'int',
		'nineas_id' => 'int',
		'courriers_id' => 'int',
		'departements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'name',
		'sigle',
		'rccm',
		'quitus',
		'ninea',
		'adresse',
		'email',
		'telephone',
		'fixe',
		'bp',
		'fax',
		'prenom_responsable',
		'nom_responsable',
		'email_responsable',
		'telephone_responsabel',
		'type',
		'details',
		'gestionnaires_id',
		'operateurs_id',
		'quitus_id',
		'rccms_id',
		'nineas_id',
		'courriers_id',
		'departements_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function departement()
	{
		return $this->belongsTo(\App\Departement::class, 'departements_id');
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

	public function rccm()
	{
		return $this->belongsTo(\App\Rccm::class, 'rccms_id');
	}

	public function agrements_types()
	{
		return $this->hasMany(\App\AgrementsType::class, 'agrements_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'modules_has_agrements', 'agrements_id', 'modules_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
