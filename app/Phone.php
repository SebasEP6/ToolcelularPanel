<?php

namespace Service;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	protected $table = 'phones';

    protected $fillable = ['name'];

    public function models()
    {
    	return $this->hasMany('Service\BrandModel');
    }

    public function entries()
    {
    	return $this->hasMany('Service\Enrty');
    }
}
