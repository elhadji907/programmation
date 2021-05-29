<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class OperateursHasNiveaux
 * 
 * @property int $operateurs_id
 * @property int $niveaux_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Niveaux $niveaux
 * @property \App\Operateur $operateur
 *
 * @package App
 */
class OperateursHasNiveaux extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'operateurs_has_niveaux';
	protected $primaryKey = 'operateurs_id';

	protected $casts = [
		'niveaux_id' => 'int'
	];

	protected $fillable = [
		'niveaux_id'
	];

	public function niveaux()
	{
		return $this->belongsTo(\App\Niveaux::class);
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}
}
