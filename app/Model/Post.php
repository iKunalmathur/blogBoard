<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
class Post extends Model
{
  public function tags()
  {
    return $this->belongsToMany('App\Model\Tag','tag_posts')->withtimestamps();
  }
  public function categories()
  {
    return $this->belongsToMany('App\Model\Category','category_posts')->withtimestamps();
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function getRouteKeyName()
  {
    return 'slug';
  }
}
