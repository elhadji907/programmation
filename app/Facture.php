<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
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
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
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
		'total' => 'float'
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
		'total'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'factures_id');
	}

	public function reglements()
	{
		return $this->hasMany(\App\Reglement::class, 'factures_id');
	}
}
