<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Jan 2020 10:10:50 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Personnel
 * 
 * @property int $id
 * @property string $uuid
 * @property string $matricule
 * @property string $cin
 * @property \Carbon\Carbon $debut
 * @property \Carbon\Carbon $fin
 * @property int $nbrefant
 * @property float $salaire
 * @property int $users_id
 * @property int $directions_id
 * @property int $categories_id
 * @property int $fonctions_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $category
 * @property \App\Direction $direction
 * @property \App\Fonction $fonction
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $familles
 *
 * @package App
 */
class Personnel extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'nbrefant' => 'int',
		'salaire' => 'float',
		'users_id' => 'int',
		'directions_id' => 'int',
		'categories_id' => 'int',
		'fonctions_id' => 'int'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'uuid',
		'matricule',
		'cin',
		'debut',
		'fin',
		'nbrefant',
		'salaire',
		'users_id',
		'directions_id',
		'categories_id',
		'fonctions_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'categories_id');
	}

	public function direction()
	{
		return $this->belongsTo(\App\Direction::class, 'directions_id');
	}

	public function fonction()
	{
		return $this->belongsTo(\App\Fonction::class, 'fonctions_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function familles()
	{
		return $this->hasMany(\App\Famille::class, 'personnels_id');
	}
}
