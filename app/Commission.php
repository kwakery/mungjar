<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $primaryKey = 'token';
    public $incrementing = false;
    protected $keyType = 'string';

    /* Get the commission's tasks */
    public function tasks() {
      return $this->hasMany('App\Task', 'commission_token', 'token');
    }
}
