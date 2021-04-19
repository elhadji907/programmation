<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
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

	protected $fillable = [
		'uuid',
		'matricule',
		'marque',
		'type_carburant'
	];
}
