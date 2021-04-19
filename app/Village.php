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
 * Class Village
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $chef_id
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
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'chef_id' => 'int',
		'communes_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'chef_id',
		'communes_id'
	];

	public function commune()
	{
		return $this->belongsTo(\App\Commune::class, 'communes_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class);
	}
}
