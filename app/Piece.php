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
 * Class Piece
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $piece1
 * @property string $piece2
 * @property string $piece3
 * @property string $piece4
 * @property string $piece5
 * @property string $piece6
 * @property string $piece7
 * @property string $piece8
 * @property string $piece9
 * @property string $piece10
 * @property string $piece11
 * @property string $piece12
 * @property string $piece13
 * @property string $piece14
 * @property string $piece15
 * @property int $demandeurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 *
 * @package App
 */
class Piece extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'demandeurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'piece1',
		'piece2',
		'piece3',
		'piece4',
		'piece5',
		'piece6',
		'piece7',
		'piece8',
		'piece9',
		'piece10',
		'piece11',
		'piece12',
		'piece13',
		'piece14',
		'piece15',
		'demandeurs_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}
}
