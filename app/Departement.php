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
 * Class Departement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $regions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Region $region
 * @property \Illuminate\Database\Eloquent\Collection $arrondissements
 *
 * @package App
 */
class Departement extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'regions_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'regions_id'
	];

	public function region()
	{
		return $this->belongsTo(\App\Region::class, 'regions_id');
	}

	public function arrondissements()
	{
		return $this->hasMany(\App\Arrondissement::class, 'departements_id');
	}
}
