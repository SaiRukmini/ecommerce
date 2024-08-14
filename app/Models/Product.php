<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

   // protected $fillable=['']

   public function Sluggable(): array
   {
    return [
        'slug'=> ['source'=>'title']
    ];
   }

}
