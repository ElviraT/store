<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'category';
   protected $primary_key = 'id';

   protected $fillable = ['id','name','id_user','id_business_cards'];
}
