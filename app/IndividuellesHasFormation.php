<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Jul 2021 11:31:03 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class IndividuellesHasFormation
 * 
 * @property int $id
 * @property int $individuelles_id
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Formation $formation
 * @property \App\Individuelle $individuelle
 *
 * @package App
 */
class IndividuellesHasFormation extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'individuelles_id' => 'int',
		'formations_id' => 'int'
	];

	protected $fillable = [
		'individuelles_id',
		'formations_id'
	];

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}

	public function individuelle()
	{
		return $this->belongsTo(\App\Individuelle::class, 'individuelles_id');
	}
}
