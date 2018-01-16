<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{

    protected $fillable = [
    	'display_name',
    	'slug_name',
    	'options',
        'width',
        'height',
        'x',
        'y'
    ];
    
    public $timestamp = true;
}
