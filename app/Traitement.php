<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Apr 2021 11:19:21 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Traitement
 * 
 * @property int $id
 * @property string $uuid
 * @property string $observations
 * @property string $motif
 * @property string $name
 * @property int $operateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Operateur $operateur
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Traitement extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'operateurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'observations',
		'motif',
		'name',
		'operateurs_id'
	];

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'traitements_id');
	}
}
