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
 * Class Commune
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property string $adresse
 * @property int $arrondissements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Arrondissement $arrondissement
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 * @property \Illuminate\Database\Eloquent\Collection $villages
 *
 * @package App
 */
class Commune extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'arrondissements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'adresse',
		'arrondissements_id'
	];

	public function arrondissement()
	{
		return $this->belongsTo(\App\Arrondissement::class, 'arrondissements_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'communes_id');
	}

	public function villages()
	{
		return $this->hasMany(\App\Village::class, 'communes_id');
	}
}
