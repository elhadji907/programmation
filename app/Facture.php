<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 14:06:05 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Facture
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property \Carbon\Carbon $date_etablissement
 * @property string $details
 * @property float $montant1
 * @property float $montant2
 * @property float $autre_montant
 * @property float $total
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Formation $formation
 * @property \Illuminate\Database\Eloquent\Collection $reglements
 *
 * @package App
 */
class Facture extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'montant1' => 'float',
		'montant2' => 'float',
		'autre_montant' => 'float',
		'total' => 'float',
		'formations_id' => 'int'
	];

	protected $dates = [
		'date_etablissement'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'date_etablissement',
		'details',
		'montant1',
		'montant2',
		'autre_montant',
		'total',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}

	public function reglements()
	{
		return $this->hasMany(\App\Reglement::class, 'factures_id');
	}
}
