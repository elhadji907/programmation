<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Apr 2021 18:20:18 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Salaire
 * 
 * @property int $id
 * @property string $uuid
 * @property float $montant
 * @property float $prime
 * @property int $note
 * @property float $autre_montant
 * @property int $categories_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $category
 *
 * @package App
 */
class Salaire extends Eloquent
{	
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'montant' => 'float',
		'prime' => 'float',
		'note' => 'int',
		'autre_montant' => 'float',
		'categories_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'montant',
		'prime',
		'note',
		'autre_montant',
		'categories_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'categories_id');
	}
}
