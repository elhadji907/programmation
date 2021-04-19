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
 * Class Arrondissement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property int $departements_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Departement $departement
 * @property \Illuminate\Database\Eloquent\Collection $communes
 *
 * @package App
 */
class Arrondissement extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'departements_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'departements_id'
	];

	public function departement()
	{
		return $this->belongsTo(\App\Departement::class, 'departements_id');
	}

	public function communes()
	{
		return $this->hasMany(\App\Commune::class, 'arrondissements_id');
	}
}
