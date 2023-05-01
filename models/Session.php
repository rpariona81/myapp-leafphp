<?php

namespace Models;

use Carbon\Carbon;

class Session extends Model
{
    protected $table = 't_sessions';
    //
    protected $appends = ['expires_at'];

    public function isExpired(){
        return $this->last_activity < Carbon::now()->subMinutes(ini_get('session.lifetime'))->getTimestamp();
    }

    public function getExpiresAtAttribute(){
        return Carbon::createFromTimestamp($this->last_activity)->addMinutes(ini_get('session.lifetime'))->toDateTimeString();
    }
}
