<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Dec 2019 22:45:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Fonction
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $profile
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $personnels
 *
 * @package App
 */
class Fonction extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'profile',
		'sigle'
	];

	public function personnels()
	{
		return $this->hasMany(\App\Personnel::class, 'fonctions_id');
	}
}
