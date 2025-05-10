<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AboutUs extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = ['title', 'description', 'image1_alt', 'online_support_number'];
    protected $guarded = [];
    protected $appends = ['image1_name'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            // ->crop('crop-center', 70, 50)
            ->performOnCollections('image1_name')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(5);
        $this->addMediaConversion('preview')
            // ->crop('crop-center', 1500, 733)
            ->performOnCollections('image1_name')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(7);
    }

    public function getImagesAttribute()
    {
        $file = $this->getMedia('image1_name')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }


}
