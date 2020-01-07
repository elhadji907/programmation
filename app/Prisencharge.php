<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Jan 2020 10:11:44 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Prisencharge
 * 
 * @property int $id
 * @property string $uuid
 * @property string $structure
 * @property float $montant
 * @property \Carbon\Carbon $date
 * @property int $familles_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Famille $famille
 *
 * @package App
 */
class Prisencharge extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'montant' => 'float',
		'familles_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'uuid',
		'structure',
		'montant',
		'date',
		'familles_id'
	];

	public function famille()
	{
		return $this->belongsTo(\App\Famille::class, 'familles_id');
	}
}
