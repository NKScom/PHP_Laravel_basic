<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Agent\Agent;

class Analytics extends Model
{
    use SoftDeletes;
    protected $fillable = ['user', 'object', 'object_id', 'action', 'description', 'ip', 'browser', 'device'];
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public static function saveUserAnalytics($object, $object_id, $action, $description)
    {
        $agent = new Agent();
        $data['user']= \Auth::check() ? \Auth::user()->name : 'guest';
        $data['ip'] = request()->ip();
        $data['object'] = $object;
        $data['object_id'] = $object_id;
        $data['action'] = $action;
        $data['description'] = $description;
        $data['browser'] = $agent->browser();
        $data['device'] = $agent->device();
        self::create($data);
    }

}
