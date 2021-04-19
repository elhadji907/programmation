<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
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
