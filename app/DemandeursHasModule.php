<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/DemandeursHasModule.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/DemandeursHasModule.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class DemandeursHasModule
 * 
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
<<<<<<< HEAD:app/DemandeursHasModule.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/DemandeursHasModule.php
	protected $primaryKey = 'demandeurs_id';

	protected $casts = [
		'modules_id' => 'int'
	];

	protected $fillable = [
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
