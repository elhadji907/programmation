<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Ingenieur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $name
 * @property string $telephone
 * @property string $email
 * @property string $specialite
 * @property \Carbon\Carbon $date
 * @property string $items1
 * @property string $items2
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $formations
 *
 * @package App
 */
class Ingenieur extends Eloquent
{
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'name',
		'telephone',
		'email',
		'specialite',
		'date',
		'items1',
		'items2'
	];

	public function formations()
	{
		return $this->hasMany(\App\Formation::class, 'ingenieurs_id');
	}
}
