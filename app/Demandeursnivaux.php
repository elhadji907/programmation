<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Aug 2020 21:39:58 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Demandeursnivaux
 * 
 * @property int $id
 * @property int $demandeurs_id
 * @property int $nivauxs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 * @property \App\Nivaux $nivaux
 *
 * @package App
 */
class Demandeursnivaux extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'demandeursnivauxs';

	protected $casts = [
		'demandeurs_id' => 'int',
		'nivauxs_id' => 'int'
	];

	protected $fillable = [
		'demandeurs_id',
		'nivauxs_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function nivaux()
	{
		return $this->belongsTo(\App\Nivaux::class, 'nivauxs_id');
	}
}
