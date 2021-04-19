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
 * Class Reglement
 * 
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $date
 * @property float $montant
 * @property int $types_id
 * @property int $factures_id
 * @property int $comptables_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Comptable $comptable
 * @property \App\Facture $facture
 * @property \App\Type $type
 *
 * @package App
 */
class Reglement extends Eloquent
{
<<<<<<< HEAD
	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
=======
	use \Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6

	protected $casts = [
		'montant' => 'float',
		'types_id' => 'int',
		'factures_id' => 'int',
		'comptables_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'date',
		'montant',
		'types_id',
		'factures_id',
		'comptables_id'
	];

	public function comptable()
	{
		return $this->belongsTo(\App\Comptable::class, 'comptables_id');
	}

	public function facture()
	{
		return $this->belongsTo(\App\Facture::class, 'factures_id');
	}

	public function type()
	{
		return $this->belongsTo(\App\Type::class, 'types_id');
	}
}
