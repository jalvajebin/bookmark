<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVacancyApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

     public function country()
    {
        return $this->belongsTo(Destination::class, 'country');
    }

    public function curriculam()
    {
        return $this->belongsTo(Destination::class, 'curriculam');
    }
}
