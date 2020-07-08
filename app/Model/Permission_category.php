<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission_category extends Model
{
  protected $fillable = ['name'];

  public function permission()
  {
    return $this->hasMany('App\Model\permission');
  }
}
