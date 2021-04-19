<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Mission
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
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 *
 * @package App
 */
class Mission extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'distance' => 'int',
		'jours' => 'int',
		'montant' => 'float',
		'reliquat' => 'float',
		'accompt' => 'float',
		'employees_id' => 'int'
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
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
