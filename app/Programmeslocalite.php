<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Aug 2020 21:42:40 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Programmeslocalite
 * 
 * @property int $id
 * @property int $programmes_id
 * @property int $localites_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Localite $localite
 * @property \App\Programme $programme
 *
 * @package App
 */
class Programmeslocalite extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'programmes_id' => 'int',
		'localites_id' => 'int'
	];

	protected $fillable = [
		'programmes_id',
		'localites_id'
	];

	public function localite()
	{
		return $this->belongsTo(\App\Localite::class, 'localites_id');
	}

	public function programme()
	{
		return $this->belongsTo(\App\Programme::class, 'programmes_id');
	}
}
