<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Dossier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $dossier1
 * @property string $dossier2
 * @property string $dossier3
 * @property string $dossier4
 * @property string $dossier5
 * @property string $dossier6
 * @property string $dossier7
 * @property string $dossier8
 * @property string $dossier9
 * @property string $dossier10
 * @property string $dossier11
 * @property string $dossier12
 * @property string $dossier13
 * @property string $dossier14
 * @property string $dossier15
 * @property int $employees_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Employee $employee
 *
 * @package App
 */
class Dossier extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'employees_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'dossier1',
		'dossier2',
		'dossier3',
		'dossier4',
		'dossier5',
		'dossier6',
		'dossier7',
		'dossier8',
		'dossier9',
		'dossier10',
		'dossier11',
		'dossier12',
		'dossier13',
		'dossier14',
		'dossier15',
		'employees_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'employees_id');
	}
}
