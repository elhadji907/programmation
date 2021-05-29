<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 May 2021 22:52:03 +0000.
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
 * @property string $titre1
 * @property \Carbon\Carbon $date1
 * @property int $options_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Option $option
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Diplome extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'options_id' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'name',
		'sigle',
		'titre1',
		'date1',
		'options_id'
	];

	public function option()
	{
		return $this->belongsTo(\App\Option::class, 'options_id');
	}

	public function demandeurs()
	{
		return $this->belongsToMany(\App\Demandeur::class, 'demandeurs_has_diplomes', 'diplomes_id', 'demandeurs_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
