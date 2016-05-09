<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    protected $table = 't2';
    protected $primaryKey = 'Userid';
    protected $fillable = ['Userid', 'NumberOfI_O'];
 	protected $dates = ['deleted_at'];
}
