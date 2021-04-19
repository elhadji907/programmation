<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD:app/BeneficiairesHasFormation.php
 * Date: Sun, 18 Apr 2021 21:48:52 +0000.
=======
 * Date: Sat, 17 Apr 2021 16:09:55 +0000.
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/BeneficiairesHasFormation.php
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
<<<<<<< HEAD:app/BeneficiairesHasFormation.php
	use \App\Helpers\UuidForKey;
	
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6:app/BeneficiairesHasFormation.php
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
