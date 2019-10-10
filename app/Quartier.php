<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 10 Oct 2019 14:26:09 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Quartier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $chef_id
 * @property int $villes_id
 * @property int $villages_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Village $village
 * @property \App\Ville $ville
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Quartier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'chef_id' => 'int',
		'villes_id' => 'int',
		'villages_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'chef_id',
		'villes_id',
		'villages_id'
	];

	public function village()
	{
		return $this->belongsTo(\App\Village::class, 'villages_id');
	}

	public function ville()
	{
		return $this->belongsTo(\App\Ville::class, 'villes_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'quartiers_id');
	}
}
