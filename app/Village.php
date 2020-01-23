<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 13:29:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\Helpers\UuidForKey;

/**
 * Class Village
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $communes_id
 * @property int $chef_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Commune $commune
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Village extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'communes_id' => 'int',
		'chef_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'communes_id',
		'chef_id'
	];

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'villages_id');
	}

	public function chef()
	{
		return $this->belongsTo(\App\Beneficiaire::class, 'chef_id');
	}
}
