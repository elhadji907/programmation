<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Depense
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property string $designation
 * @property string $fournisseurs
 * @property float $montant
 * @property float $tva
 * @property float $ir
 * @property float $autre_montant
 * @property float $total
 * @property int $activites_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Activite $activite
 * @property \Illuminate\Database\Eloquent\Collection $projets
 *
 * @package App
 */
class Depense extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'montant' => 'float',
		'tva' => 'float',
		'ir' => 'float',
		'autre_montant' => 'float',
		'total' => 'float',
		'activites_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'designation',
		'fournisseurs',
		'montant',
		'tva',
		'ir',
		'autre_montant',
		'total',
		'activites_id'
	];

	public function activite()
	{
		return $this->belongsTo(\App\Activite::class, 'activites_id');
	}

	public function projets()
	{
		return $this->hasMany(\App\Projet::class, 'depenses_id');
	}
}
