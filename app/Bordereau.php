<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Apr 2021 10:57:17 +0000.
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
 * @property int $dafs_id
 * @property \Carbon\Carbon $date_mandat
 * @property string $designation
 * @property float $montant
 * @property int $nombre_de_piece
 * @property string $observation
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Daf $daf
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
		'dafs_id' => 'int',
		'montant' => 'float',
		'nombre_de_piece' => 'int'
	];

	protected $dates = [
		'date_mandat'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'numero_mandat',
		'dafs_id',
		'date_mandat',
		'designation',
		'montant',
		'nombre_de_piece',
		'observation'
	];

	public function daf()
	{
		return $this->belongsTo(\App\Daf::class, 'dafs_id');
	}

	public function listes()
	{
		return $this->hasMany(\App\Liste::class, 'bordereaus_id');
	}
}
