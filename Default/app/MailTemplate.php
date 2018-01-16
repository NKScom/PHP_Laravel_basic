<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class MailTemplate extends Model
{
	use SoftDeletes;

   	protected $fillable = [ 'title', 'body'];

   	public $timestamp = true;

	protected $dates = ['deleted_at'];


}
