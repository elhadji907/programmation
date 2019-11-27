<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Nov 2019 16:42:20 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $uuid
 * @property string $code
 * @property int $typesformations_id
 * @property int $certifications_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Certification $certification
 * @property \App\Typesformation $typesformation
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Formation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'typesformations_id' => 'int',
		'certifications_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'code',
		'typesformations_id',
		'certifications_id'
	];

	public function certification()
	{
		return $this->belongsTo(\App\Certification::class, 'certifications_id');
	}

	public function typesformation()
	{
		return $this->belongsTo(\App\Typesformation::class, 'typesformations_id');
	}

	public function beneficiaires()
	{
		return $this->belongsToMany(\App\Beneficiaire::class, 'beneficiairesformations', 'formations_id', 'beneficiaires_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
