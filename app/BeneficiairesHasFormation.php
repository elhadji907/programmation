<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class BeneficiairesHasFormation
 * 
 * @property int $beneficiaires_id
 * @property int $formations_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Beneficiaire $beneficiaire
 * @property \App\Formation $formation
 *
 * @package App
 */
class BeneficiairesHasFormation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'beneficiaires_id';

	protected $casts = [
		'formations_id' => 'int'
	];

	protected $fillable = [
		'formations_id'
	];

	public function beneficiaire()
	{
		return $this->belongsTo(\App\Beneficiaire::class, 'beneficiaires_id');
	}

	public function formation()
	{
		return $this->belongsTo(\App\Formation::class, 'formations_id');
	}
}
