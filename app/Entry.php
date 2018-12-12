<?php

namespace Service;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';

    protected $fillable = ['c_name', 'c_id', 'email', 'phone_id',
                            'brand_model_id', 'p_imei', 'observation',
                            'delivery', 'error', 'budget', 'state'];

    public function user()
    {
    	return $this->belongsTo('Service\User');
    }

    public function phone()
    {
    	return $this->belongsTo('Service\Phone');
    }

    public function brand_model()
    {
    	return $this->belongsTo('Service\BrandModel');
    }

    public function images()
    {
        return $this->hasMany('Service\Image');
    }

    public function getIngressAttribute()
    {
        return \Carbon\Carbon::Parse($this->created_at)->format('d-M-Y h:i');
    }

    public function getEgressAttribute()
    {
        return \Carbon\Carbon::parse($this->delivery)->format('d-M-Y');
    }

    public function getSecretAttribute()
    {
        $arr = str_split($this->p_imei, 3);
        for ($i=0; $i < count($arr) - 1; $i++)
        {
            $arr[$i] = '****';
        }
        return implode("", $arr);
    }
}