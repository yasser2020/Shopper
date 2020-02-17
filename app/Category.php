<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tb1_category';
    protected $fillable = ['category_name','category_description','publication_status'];
}
