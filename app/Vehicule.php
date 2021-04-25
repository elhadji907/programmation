<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Apr 2021 18:20:18 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Vehicule
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $marque
 * @property string $type_carburant
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Vehicule extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $fillable = [
		'uuid',
		'matricule',
		'marque',
		'type_carburant'
	];
}
