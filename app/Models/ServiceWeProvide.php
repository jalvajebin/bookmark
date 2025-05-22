<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceWeProvide extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'description'];

    // Automatically append the icon URL to model JSON output
    protected $appends = ['icon', 'images'];

    /**
     * Register media conversions (thumbnails, previews)
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->format('webp')
            ->quality(80)
            ->sharpen(5)
            ->nonQueued()
            ->performOnCollections('icon', 'images');

        $this->addMediaConversion('preview')
            ->width(600)
            ->height(400)
            ->format('webp')
            ->quality(90)
            ->sharpen(5)
            ->nonQueued()
            ->performOnCollections('icon', 'images');
    }

    /**
     * Accessor for full image URLs (original, thumb, preview)
     */
    public function getIconAttribute()
    {
        $file = $this->getMedia('icon')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }

     public function getImagesAttribute()
    {
        $file = $this->getMedia( 'images')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }
}
