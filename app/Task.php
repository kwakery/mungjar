<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function commission() {
      return $this->belongsTo('App\Post', 'commission_token', 'token');
    }
}
