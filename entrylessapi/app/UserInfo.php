<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Model
{
    use SoftDeletes;

    protected $table = 't1';
    protected $primaryKey = 'Userid';
    protected $fillable = ['Name', 'Address1','Address2','Zip','State','Country'];
 	protected $dates = ['deleted_at'];
}
