<?php

namespace Service;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
	protected $table = "brand_models";

    protected $fillable = ['name', 'phone_id'];

    public function phone()
    {
    	return $this->belongsTo('Service\Phone');
    }

    public function entries()
    {
    	return $this->hasMany('Service\Entry');
    }
}
