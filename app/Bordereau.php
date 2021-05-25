<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Bordereau
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero
 * @property int $numero_mandat
 * @property \Carbon\Carbon $date_mandat
 * @property string $designation
 * @property float $montant
 * @property int $nombre_de_piece
 * @property string $observation
 * @property int $courriers_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Courrier $courrier
 * @property \Illuminate\Database\Eloquent\Collection $listes
 *
 * @package App
 */
class Bordereau extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'numero_mandat' => 'int',
		'montant' => 'float',
		'nombre_de_piece' => 'int',
		'courriers_id' => 'int'
	];

	protected $dates = [
		'date_mandat'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'numero_mandat',
		'date_mandat',
		'designation',
		'montant',
		'nombre_de_piece',
		'observation',
		'courriers_id'
	];

	public function courrier()
	{
		return $this->belongsTo(\App\Courrier::class, 'courriers_id');
	}

	public function listes()
	{
		return $this->hasMany(\App\Liste::class, 'bordereaus_id');
	}
}
