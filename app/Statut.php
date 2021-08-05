<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Jul 2021 17:22:04 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Statut
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $niveau
 * @property string $details
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
 * @property \Carbon\Carbon $date3
 * @property \Carbon\Carbon $date5
 * @property \Carbon\Carbon $date6
 * @property \Carbon\Carbon $date7
 * @property \Carbon\Carbon $date8
 * @property \Carbon\Carbon $date9
 * @property \Carbon\Carbon $date10
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Statut extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'niveau' => 'int'
	];

	protected $dates = [
		'date1',
		'date2',
		'date3',
		'date5',
		'date6',
		'date7',
		'date8',
		'date9',
		'date10'
	];

	protected $fillable = [
		'uuid',
		'name',
		'niveau',
		'details',
		'date1',
		'date2',
		'date3',
		'date5',
		'date6',
		'date7',
		'date8',
		'date9',
		'date10'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'statuts_id');
	}

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'statuts_id');
	}
}
