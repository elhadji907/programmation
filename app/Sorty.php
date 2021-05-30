<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Sorty
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $localites
 * @property int $distance
 * @property int $jours
 * @property \Carbon\Carbon $date_visa
 * @property \Carbon\Carbon $date_mandat
 * @property \Carbon\Carbon $date_ac
 * @property string $tva_ir
 * @property string $rejet
 * @property \Carbon\Carbon $date_cg
 * @property string $retour
 * @property string $paye
 * @property \Carbon\Carbon $date_paye
 * @property \Carbon\Carbon $date_depart
 * @property \Carbon\Carbon $date_retour
 * @property string $destination
 * @property float $montant
 * @property float $reliquat
 * @property float $accompt
 * @property int $employees_id
 * @property int $vehicules_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 * @property \App\Vehicule $vehicule
 *
 * @package App
 */
class Sorty extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'distance' => 'int',
		'jours' => 'int',
		'montant' => 'float',
		'reliquat' => 'float',
		'accompt' => 'float',
		'employees_id' => 'int',
		'vehicules_id' => 'int'
	];

	protected $dates = [
		'date_visa',
		'date_mandat',
		'date_ac',
		'date_cg',
		'date_paye',
		'date_depart',
		'date_retour'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'localites',
		'distance',
		'jours',
		'date_visa',
		'date_mandat',
		'date_ac',
		'tva_ir',
		'rejet',
		'date_cg',
		'retour',
		'paye',
		'date_paye',
		'date_depart',
		'date_retour',
		'destination',
		'montant',
		'reliquat',
		'accompt',
		'employees_id',
		'vehicules_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}

	public function vehicule()
	{
		return $this->belongsTo(\App\Vehicule::class, 'vehicules_id');
	}
}
