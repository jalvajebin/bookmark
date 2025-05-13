<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function getBlogCount()
    {
        //   dd($blog_id);
        return $this->hasMany(MultipleBlogCategory::class, 'category_id', 'id');
    }
}
