<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 10 Oct 2019 11:12:18 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $pays_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Pay $pay
 * @property \Illuminate\Database\Eloquent\Collection $departements
 *
 * @package App
 */
class Region extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'pays_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'pays_id'
	];

	public function pay()
	{
		return $this->belongsTo(\App\Pay::class, 'pays_id');
	}

	public function departements()
	{
		return $this->hasMany(\App\Departement::class, 'regions_id');
	}
}
