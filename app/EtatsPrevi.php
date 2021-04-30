<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Apr 2021 10:57:37 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EtatsPrevi
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property \Carbon\Carbon $date_recep
 * @property string $designation
 * @property string $observation
 * @property float $montant
 * @property \Carbon\Carbon $date_depart
 * @property \Carbon\Carbon $periode
 * @property \Carbon\Carbon $date_retour
 * @property \Carbon\Carbon $date_transmission
 * @property \Carbon\Carbon $date_dag
 * @property \Carbon\Carbon $date_ac
 * @property int $dafs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Daf $daf
 *
 * @package App
 */
class EtatsPrevi extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'montant' => 'float',
		'dafs_id' => 'int'
	];

	protected $dates = [
		'date_recep',
		'date_depart',
		'periode',
		'date_retour',
		'date_transmission',
		'date_dag',
		'date_ac'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_recep',
		'designation',
		'observation',
		'montant',
		'date_depart',
		'periode',
		'date_retour',
		'date_transmission',
		'date_dag',
		'date_ac',
		'dafs_id'
	];

	public function daf()
	{
		return $this->belongsTo(\App\Daf::class, 'dafs_id');
	}
}
