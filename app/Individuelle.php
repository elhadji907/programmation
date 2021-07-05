<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jun 2021 12:29:23 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Individuelle
 * 
 * @property int $id
 * @property string $uuid
 * @property string $cin
 * @property int $nbre_pieces
 * @property string $legende
 * @property string $reference
 * @property string $experience
 * @property string $projet
 * @property string $prerequis
 * @property string $information
 * @property string $items1
 * @property \Carbon\Carbon $date1
 * @property int $demandeurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Demandeur $demandeur
 *
 * @package App
 */
class Individuelle extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'nbre_pieces' => 'int',
		'demandeurs_id' => 'int'
	];

	protected $dates = [
		'date1'
	];

	protected $fillable = [
		'uuid',
		'cin',
		'nbre_pieces',
		'legende',
		'reference',
		'experience',
		'projet',
		'prerequis',
		'information',
		'note',
		'items1',
		'date1',
		'demandeurs_id'
	];

	public function demandeur()
	{
		return $this->belongsTo(\App\Demandeur::class, 'demandeurs_id');
	}
}
