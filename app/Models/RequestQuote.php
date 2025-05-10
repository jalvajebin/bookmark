<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestQuote extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'message', 'message_id'];
    protected $guarded = [];
}
