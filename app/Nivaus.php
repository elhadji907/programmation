<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:21 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Nivaus
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Nivaus extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'nivaus';

	protected $fillable = [
		'uuid',
		'name'
	];

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class);
	}
}
