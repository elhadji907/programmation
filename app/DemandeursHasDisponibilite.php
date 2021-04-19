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
 * Class DemandeursHasDisponibilite
 * 
 * @property int $demandeurs_id
 * @property int $disponibilites_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 * @property \App\Disponibilite $disponibilite
 *
 * @package App
 */
class DemandeursHasDisponibilite extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
	protected $primaryKey = 'demandeurs_id';

	protected $casts = [
		'disponibilites_id' => 'int'
	];

	protected $fillable = [
		'disponibilites_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function disponibilite()
	{
		return $this->belongsTo(\App\Disponibilite::class, 'disponibilites_id');
	}
}
