<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'slug',
  ];

  public function posts()
    {
        return $this->belongsToMany('App\Model\post','category_posts')->orderBy('created_at','DESC')->paginate(5);
    }
    public function getRouteKeyName()
    {
       return 'slug';
    }
}
