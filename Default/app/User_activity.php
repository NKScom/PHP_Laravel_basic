<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Agent\Agent;
use TCG\Voyager\Facades\Voyager;
use Auth;

class User_activity extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'user_ip', 'action', 'object', 'object_id', 'description', 'browser', 'device', 'seen'];

    protected $dates = ['deleted_at'];

    public $timestamps = true;

    public function userId()
    {
        return $this->belongsTo('TCG\Voyager\Models\User', 'user_id' ,'id');
    }

    public static function saveActivity($user_id = null, $action, $object = null, $object_id=null, $description)
    {
        $agent = new Agent();

        $user_id = $user_id ? : null;

        self::create(['user_id' => $user_id, 'user_ip' => request()->ip(), 'action' => $action, 'object' => $object, 'object_id' => $object_id, 'description' => $description, 'browser' => $agent->browser(), 'device' => $agent->device()]);
    }
}
