<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/ModulesHasOperateur.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/ModulesHasOperateur.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class ModulesHasOperateur
 * 
 * @property int $modules_id
 * @property int $operateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Module $module
 * @property \App\Operateur $operateur
 *
 * @package App
 */
class ModulesHasOperateur extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD:app/ModulesHasOperateur.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/ModulesHasOperateur.php
	protected $primaryKey = 'modules_id';

	protected $casts = [
		'operateurs_id' => 'int'
	];

	protected $fillable = [
		'operateurs_id'
	];

	public function module()
	{
		return $this->belongsTo(\App\Module::class, 'modules_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'operateurs_id');
	}
}
