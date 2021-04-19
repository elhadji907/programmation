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
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
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
