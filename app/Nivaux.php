<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 29 Nov 2019 12:31:45 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Nivaux
 * 
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $beneficiaires_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Beneficiaire $beneficiaire
 *
 * @package App
 */
class Nivaux extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	
	protected $table = 'nivauxs';

	protected $casts = [
		'beneficiaires_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'beneficiaires_id'
	];

	public function beneficiaire()
	{
		return $this->belongsTo(\App\Beneficiaire::class, 'beneficiaires_id');
	}
}