<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jun 2021 21:40:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Notification
 * 
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $data
 * @property \Carbon\Carbon $read_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Notification extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'notifiable_id' => 'int'
	];

	protected $dates = [
		'read_at'
	];

	protected $fillable = [
		'type',
		'notifiable_type',
		'notifiable_id',
		'data',
		'read_at'
	];
}
