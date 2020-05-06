<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userDetails extends Model
{
    /*table name*/
    protected $table      ='usersdetails';  

    /*primarykey*/  
  	protected $primaryKey = 'id';

  	/*table fields*/
    protected $fillable  = [
                           'userId',
                           'mail',
                           'dob',
                           'city',
                           'status',
                           'created_at',
                           'updated_at'
                           ];
}
