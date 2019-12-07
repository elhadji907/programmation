<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $antennes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Antenne $antenne
 * @property \Illuminate\Database\Eloquent\Collection $departements
 *
 * @package App
 */
class Region extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'antennes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'antennes_id'
	];

	public function antenne()
	{
		return $this->belongsTo(\App\Antenne::class, 'antennes_id');
	}

	public function departements()
	{
		return $this->hasMany(\App\Departement::class, 'regions_id');
	}
}
