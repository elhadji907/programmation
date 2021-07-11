<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 11:31:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Collective
 * 
 * @property int $id
 * @property string $uuid
 * @property string $cin
 * @property string $name
 * @property string $items1
 * @property \Carbon\Carbon $date1
 * @property int $demandeurs_id
 * @property string $sigle
 * @property string $statut
 * @property string $description
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 * @property \Illuminate\Database\Eloquent\Collection $formations
 * @property \Illuminate\Database\Eloquent\Collection $membres
 *
 * @package App
 */
class Collective extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'demandeurs_id' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'cin',
		'name',
		'items1',
		'date1',
		'demandeurs_id',
		'sigle',
		'statut',
		'description'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function formations()
	{
		return $this->belongsToMany(\App\Formation::class, 'collectives_has_formations', 'collectives_id', 'formations_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function membres()
	{
		return $this->hasMany(\App\Membre::class, 'collectives_id');
	}
}
