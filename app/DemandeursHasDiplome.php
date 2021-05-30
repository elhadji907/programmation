<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 May 2021 10:51:17 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class DemandeursHasDiplome
 * 
 * @property int $id
 * @property int $demandeurs_id
 * @property int $diplomes_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 * @property \App\Diplome $diplome
 *
 * @package App
 */
class DemandeursHasDiplome extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'demandeurs_id' => 'int',
		'diplomes_id' => 'int'
	];

	protected $fillable = [
		'demandeurs_id',
		'diplomes_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function diplome()
	{
		return $this->belongsTo(\App\Diplome::class, 'diplomes_id');
	}
}
