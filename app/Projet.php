<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Apr 2021 10:56:04 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Projet
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $sigle
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $banques
 * @property \Illuminate\Database\Eloquent\Collection $dafs
 * @property \Illuminate\Database\Eloquent\Collection $listes
 *
 * @package App
 */
class Projet extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $fillable = [
		'uuid',
		'name',
		'sigle'
	];

	public function banques()
	{
		return $this->hasMany(\App\Banque::class, 'projets_id');
	}

	public function dafs()
	{
		return $this->hasMany(\App\Daf::class, 'projets_id');
	}

	public function listes()
	{
		return $this->hasMany(\App\Liste::class, 'projets_id');
	}
}
