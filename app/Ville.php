<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Oct 2019 12:14:26 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Ville
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $communes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Commune $commune
 * @property \Illuminate\Database\Eloquent\Collection $quartiers
 *
 * @package App
 */
class Ville extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'communes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'communes_id'
	];

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}

	public function quartiers()
	{
		return $this->hasMany(\App\Quartier::class, 'villes_id');
	}
}
