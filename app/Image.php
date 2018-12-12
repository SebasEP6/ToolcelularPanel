<?php

namespace Service;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['path', 'entry_id'];

    public function entry()
    {
    	return $this->belongsTo('Service\Entry');
    }
}
