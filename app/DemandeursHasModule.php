<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class DemandeursHasModule
 * 
 * @property int $id
 * @property int $demandeurs_id
 * @property int $modules_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 * @property \App\Module $module
 *
 * @package App
 */
class DemandeursHasModule extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'demandeurs_id' => 'int',
		'modules_id' => 'int'
	];

	protected $fillable = [
		'demandeurs_id',
		'modules_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}
}
