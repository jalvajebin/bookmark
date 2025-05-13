<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleBlogTag extends Model
{
    use HasFactory;

    protected $fillable=['blog_id','tag_id'];

    public function tagFilter()
    {
        return $this->belongsTo(Tag::class,'tag_id','id')->where('status',1);
    }
}
