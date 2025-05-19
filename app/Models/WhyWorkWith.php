<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WhyWorkWith extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
    ];

    // Appended to model JSON output (optional)
    protected $appends = ['image'];

    /**
     * Register conversions for images.
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
            ->performOnCollections('image1_name');

        $this->addMediaConversion('preview')
            ->width(600)
            ->height(400)
            ->format('webp')
            ->quality(90)
            ->sharpen(5)
            ->nonQueued()
            ->performOnCollections('image1_name');
    }

    /**
     * Get image URLs with conversions.
     */
    public function getImageAttribute()
    {
        $media = $this->getMedia('image1_name')->last();
        if ($media) {
            return [
                'original' => $media->getUrl(),
                'thumb' => $media->getUrl('thumb'),
                'preview' => $media->getUrl('preview'),
            ];
        }
        return null;
    }
}
    