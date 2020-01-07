<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Jan 2020 10:11:35 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Famille
 * 
 * @property int $id
 * @property string $uuid
 * @property string $firstname
 * @property string $name
 * @property \Carbon\Carbon $date_naissance
 * @property string $lieu_naissance
 * @property string $lien
 * @property string $sexe
 * @property int $personnels_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Personnel $personnel
 * @property \Illuminate\Database\Eloquent\Collection $prisencharges
 *
 * @package App
 */
class Famille extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'personnels_id' => 'int'
	];

	protected $dates = [
		'date_naissance'
	];

	protected $fillable = [
		'uuid',
		'firstname',
		'name',
		'date_naissance',
		'lieu_naissance',
		'lien',
		'sexe',
		'personnels_id'
	];

	public function personnel()
	{
		return $this->belongsTo(\App\Personnel::class, 'personnels_id');
	}

	public function prisencharges()
	{
		return $this->hasMany(\App\Prisencharge::class, 'familles_id');
	}
}
