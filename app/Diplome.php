<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 20 Aug 2020 13:42:33 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Diplome
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $autre
 * @property int $options_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Option $option
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Diplome extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'options_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'autre',
		'options_id'
	];

	public function option()
	{
		return $this->belongsTo(\App\Option::class, 'options_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiairesdiplomes', 'diplomes_id', 'beneficiaires_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeursdiplomes', 'diplomes_id', 'demandeurs_id')
					->withPivot('id', 'deleted', 'update');
	}
}
