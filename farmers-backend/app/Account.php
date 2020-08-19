<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function scopeGetPendingApproval(){
        $query = DB::table('users')->where('is_approved',0)->get();
        return $query;
    }
}
