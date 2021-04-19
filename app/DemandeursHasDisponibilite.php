<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Apr 2021 11:19:21 +0000.
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
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
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
