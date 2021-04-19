<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/Disponibilite.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/Disponibilite.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Disponibilite
 * 
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $date1
 * @property \Carbon\Carbon $date2
 * @property \Carbon\Carbon $date3
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Disponibilite extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD:app/Disponibilite.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/Disponibilite.php

	protected $dates = [
		'date1',
		'date2',
		'date3'
	];

	protected $fillable = [
		'uuid',
		'date1',
		'date2',
		'date3'
	];

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeurs_has_disponibilites', 'disponibilites_id', 'demandeurs_id')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
