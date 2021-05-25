<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 May 2021 21:36:57 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Notification
 * 
 * @property int $id
 * @property string $uuid
 * @property string $type
 * @property int $notifiable
 * @property string $data
 * @property \Carbon\Carbon $read_at
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Notification extends Eloquent
{
		
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;
	

	protected $casts = [
		'notifiable' => 'int'
	];

	protected $dates = [
		'read_at'
	];

	protected $fillable = [
		'uuid',
		'type',
		'notifiable',
		'data',
		'read_at'
	];
}
