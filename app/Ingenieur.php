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
 * Class Ingenieur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
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
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
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
