<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitCvApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    // SubmitCvApplication.php

    public function passportDestination()
    {
        return $this->belongsTo(Destination::class, 'passport');
    }

    public function birthCountryDestination()
    {
        return $this->belongsTo(Destination::class, 'birth_country');
    }

    public function currentCountryDestination()
    {
        return $this->belongsTo(Destination::class, 'current_country');
    }
}
