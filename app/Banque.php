<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Apr 2021 10:58:14 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Banque
 * 
 * @property int $id
 * @property string $uuid
 * @property int $dafs_id
 * @property int $projets_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Daf $daf
 * @property \App\Projet $projet
 *
 * @package App
 */
class Banque extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'dafs_id' => 'int',
		'projets_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'dafs_id',
		'projets_id'
	];

	public function daf()
	{
		return $this->belongsTo(\App\Daf::class, 'dafs_id');
	}

	public function projet()
	{
		return $this->belongsTo(\App\Projet::class, 'projets_id');
	}
}
