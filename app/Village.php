<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 10 Oct 2019 14:26:09 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Village
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
class Village extends Eloquent
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
		return $this->hasMany(\App\Quartier::class, 'villages_id');
	}
}
