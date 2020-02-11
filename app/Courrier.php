<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Jan 2020 12:21:48 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Courrier
 * 
 * @property int $id
 * @property string $uuid
 * @property string $objet
 * @property string $expediteur
 * @property string $telephone
 * @property string $email
 * @property string $adresse
 * @property string $fax
 * @property string $bp
 * @property string $type
 * @property string $message
 * @property string $legende
 * @property string $file
 * @property string $statut
 * @property \Carbon\Carbon $date_c
 * @property \Carbon\Carbon $date_r
 * @property int $types_courriers_id
 * @property int $gestionnaires_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestionnaire $gestionnaire
 * @property \App\TypesCourrier $types_courrier
 * @property \Illuminate\Database\Eloquent\Collection $directions
 * @property \Illuminate\Database\Eloquent\Collection $demandeurs
 * @property \Illuminate\Database\Eloquent\Collection $departs
 * @property \Illuminate\Database\Eloquent\Collection $internes
 * @property \Illuminate\Database\Eloquent\Collection $programmes
 * @property \Illuminate\Database\Eloquent\Collection $recues
 *
 * @package App
 */
class Courrier extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'types_courriers_id' => 'int',
		'gestionnaires_id' => 'int'
	];

	protected $dates = [
		'date_c',
		'date_r'
	];

	protected $fillable = [
		'uuid',
		'numero',
		'objet',
		'expediteur',
		'telephone',
		'email',
		'adresse',
		'fax',
		'bp',
		'type',
		'message',
		'legende',
		'file',
		'statut',
		'date_c',
		'date_r',
		'types_courriers_id',
		'gestionnaires_id',
		'users_id'
	];

	public function getFile(){
		$filePath = $this->file ?? 'recues/default.jpg';
		return "/storage/" . $filePath;
	}

	public function gestionnaire()
	{
		return $this->belongsTo(\App\Gestionnaire::class, 'gestionnaires_id');
	}
	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function types_courrier()
	{
		return $this->belongsTo(\App\TypesCourrier::class, 'types_courriers_id');
	}

	public function directions()
	{
		return $this->belongsToMany(\App\Direction::class, 'courriersdirections', 'courriers_id', 'directions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function demandeurs()
	{
		return $this->hasMany(\App\Demandeur::class, 'courriers_id');
	}

	public function departs()
	{
		return $this->hasMany(\App\Depart::class, 'courriers_id');
	}

	public function internes()
	{
		return $this->hasMany(\App\Interne::class, 'courriers_id');
	}

	public function programmes()
	{
		return $this->hasMany(\App\Programme::class, 'courriers_id');
	}

	public function recues()
	{
		return $this->hasMany(\App\Recue::class, 'courriers_id')->orderBy('created_at', 'DESC');
	}

	public function comments()
	{
		return $this->morphMany('\App\Comment', 'commentable')->latest();
	}
}
