<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Programme
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $duree
 * @property int $effectif
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $regions
 *
 * @package App
 */
class Programme extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'effectif' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'duree',
		'effectif'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'programmes_id');
	}

	public function modules()
	{
		return $this->belongsToMany(\App\Module::class, 'programmes_has_modules', 'programmes_id', 'modules_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function regions()
	{
		return $this->belongsToMany(\App\Region::class, 'programmes_has_regions', 'programmes_id', 'regions_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
