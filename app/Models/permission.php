<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
  protected $fillable = [
      'id', 'pid', 'pername', 'mname', 'cname', 'aname'
  ];
}