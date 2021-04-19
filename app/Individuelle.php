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
 * Class Individuelle
 * 
 * @property int $id
 * @property string $uuid
 * @property string $cin
<<<<<<< HEAD
 * @property int $nbre_pieces
 * @property string $legende
 * @property string $reference
 * @property string $experience
 * @property string $projet
 * @property string $prerequis
 * @property string $information
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
 * @property string $items1
 * @property \Carbon\Carbon $date1
 * @property int $demandeurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 *
 * @package App
 */
class Individuelle extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'nbre_pieces' => 'int',
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
		'demandeurs_id' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'cin',
<<<<<<< HEAD
		'nbre_pieces',
		'legende',
		'reference',
		'experience',
		'projet',
		'prerequis',
		'information',
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
		'items1',
		'date1',
		'demandeurs_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}
}
