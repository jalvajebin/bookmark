<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WhatWeDo extends Model   implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'type', 'title', 'description',
        'title_one', 'para_one',
        'title_two', 'para_two',
        'title_three', 'para_three',
    ];

}
