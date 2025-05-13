<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleBlogCategory extends Model
{
    use HasFactory;

    protected $fillable=['blog_id','category_id'];

    public function categoryFilter()
    {
        return $this->belongsTo(BlogCategory::class,'category_id','id')->where('status',1);
    }

}
