<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use \App\Helpers\UuidForKey;

/**
 * Class Beneficiairesdomaine
 * 
 * @property int $id
 * @property int $beneficiaires_id
 * @property int $domaines_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Beneficiaire $beneficiaire
 * @property \App\Domaine $domaine
 *
 * @package App
 */
class Beneficiairesdomaine extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'beneficiaires_id' => 'int',
		'domaines_id' => 'int'
	];

	protected $fillable = [
		'beneficiaires_id',
		'domaines_id'
	];

	public function beneficiaire()
	{
		return $this->belongsTo(\App\Beneficiaire::class, 'beneficiaires_id');
	}

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}
}
