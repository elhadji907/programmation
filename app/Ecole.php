<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Ecole
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $items1
 * @property \Carbon\Carbon $date1
 * @property string $sigle
 * @property string $telephone1
 * @property string $telephone2
 * @property string $fixe
 * @property string $email
 * @property string $adresse
 * @property int $regions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Region $region
 *
 * @package App
 */
class Ecole extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'regions_id' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'name',
		'items1',
		'date1',
		'sigle',
		'telephone1',
		'telephone2',
		'fixe',
		'email',
		'adresse',
		'regions_id'
	];

	public function region()
	{
		return $this->belongsTo(\App\Region::class, 'regions_id');
	}
}
