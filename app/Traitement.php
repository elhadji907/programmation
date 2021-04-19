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
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

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
