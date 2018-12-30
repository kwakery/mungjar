<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['commission_token', 'status'];

    public function commission() {
      return $this->belongsTo('App\Commission', 'commission_token', 'token');
    }
}
