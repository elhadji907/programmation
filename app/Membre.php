<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Membre
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $firtname
 * @property string $cin
 * @property \Carbon\Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $niveaux
 * @property string $experience_domaine
 * @property string $autre_experience
 * @property string $titre1
 * @property \Carbon\Carbon $date1
 * @property int $collectives_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Collective $collective
 *
 * @package App
 */
class Membre extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'collectives_id' => 'int'
	];

	protected $dates = [
		'date_naissance',
		'date1'
	];

	protected $fillable = [
		'uuid',
		'name',
		'firtname',
		'cin',
		'date_naissance',
		'lieu_naissance',
		'niveaux',
		'experience_domaine',
		'autre_experience',
		'titre1',
		'date1',
		'collectives_id'
	];

	public function collective()
	{
		return $this->belongsTo(\App\Collective::class, 'collectives_id');
	}
}
