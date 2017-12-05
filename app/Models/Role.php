<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable = [
      'id', 'rolename', 'per_list'
  ];
  public function manager()
    {
        return $this->belongsTo('App\Models\Manager');
    }
}
