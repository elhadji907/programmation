<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 07 Dec 2019 11:31:38 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Beneficiairessecteur
 * 
 * @property int $id
 * @property int $beneficiaires_id
 * @property int $secteurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Beneficiaire $beneficiaire
 * @property \App\Secteur $secteur
 *
 * @package App
 */
class Beneficiairessecteur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'beneficiaires_id' => 'int',
		'secteurs_id' => 'int'
	];

	protected $fillable = [
		'beneficiaires_id',
		'secteurs_id'
	];

	public function beneficiaire()
	{
		return $this->belongsTo(\App\Beneficiaire::class, 'beneficiaires_id');
	}

	public function secteur()
	{
		return $this->belongsTo(\App\Secteur::class, 'secteurs_id');
	}
}
