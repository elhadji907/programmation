<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Apr 2021 10:58:06 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class OrdresMission
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property \Carbon\Carbon $date_recep
 * @property string $beneficiaire
 * @property float $montant
 * @property \Carbon\Carbon $date_depart
 * @property \Carbon\Carbon $date_retour
 * @property \Carbon\Carbon $date_transmission
 * @property \Carbon\Carbon $date_dag
 * @property \Carbon\Carbon $date_ac
 * @property int $dafs_id
 * @property int $employees_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Daf $daf
 * @property \App\Employee $employee
 *
 * @package App
 */
class OrdresMission extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'montant' => 'float',
		'dafs_id' => 'int',
		'employees_id' => 'int'
	];

	protected $dates = [
		'date_recep',
		'date_depart',
		'date_retour',
		'date_transmission',
		'date_dag',
		'date_ac'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_recep',
		'beneficiaire',
		'montant',
		'date_depart',
		'date_retour',
		'date_transmission',
		'date_dag',
		'date_ac',
		'dafs_id',
		'employees_id'
	];

	public function daf()
	{
		return $this->belongsTo(\App\Daf::class, 'dafs_id');
	}

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
