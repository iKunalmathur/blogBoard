<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function tags()
  {
    return $this->belongsToMany('App\Model\tag','tag_posts')->withtimestamps();
  }
  public function categories()
  {
    return $this->belongsToMany('App\Model\category','category_posts')->withtimestamps();
  }
  public function user()
  {
    return $this->belongsTo('App\user');
  }
  public function getRouteKeyName()
  {
    return 'slug';
  }
}
