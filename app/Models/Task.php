<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','description', 'priority'];
    protected $table = 'tasks';

  public function categories()
  {
    return $this -> belongsToMany(Category::class,'category_task');
  }
}
