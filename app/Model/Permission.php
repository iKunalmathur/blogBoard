<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $fillable = ['name','permission_category_id'];

  public function permission_category()
  {
    return $this->belongsTo('App\Model\Permission_category');
  }
  // public function roles()
  // {
  //   return $this->belongsToMany('App\Model\Role','permission_roles');
  // }
}
