<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userotp extends Model
{
    /*table name*/
    protected $table      ='usersotp';  

    /*primarykey*/  
  	protected $primaryKey = 'id';

  	/*table fields*/
    protected $fillable  = [
                           'userId',
                           'userotp',
                           'created_at',
                           'updated_at'
                           ];
}
