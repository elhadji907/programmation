<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Oct 2019 15:40:20 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Village extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

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

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'villages_id');
	}
}
