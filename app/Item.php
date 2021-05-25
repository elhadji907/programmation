<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Item
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $items1
 * @property \Carbon\Carbon $date1
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 *
 * @package App
 */
class Item extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'name',
		'items1',
		'date1'
	];

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class, 'items_id');
	}
}
