<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Option
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $titre1
 * @property \Carbon\Carbon $date1
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $diplomes
 *
 * @package App
 */
class Option extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'name',
		'titre1',
		'date1'
	];

	public function diplomes()
	{
		return $this->hasMany(\App\Diplome::class, 'options_id');
	}
}
