<?php

namespace Service;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
	protected $table = 'records';

	public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('Service\User');
    }
}
