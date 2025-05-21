<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WhatWeDo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'title_one',
        'para_one',
        'title_two',
        'para_two',
        'title_one',
        'para_one',
        'title_three',
        'para_three',
    ];
    protected $guarded = [];

    // Appended to model JSON output (optional)
    protected $appends = ['what_images'];

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
            ->performOnCollections('what_images');

        $this->addMediaConversion('preview')
            ->width(600)
            ->height(400)
            ->format('webp')
            ->quality(90)
            ->sharpen(5)
            ->nonQueued()
            ->performOnCollections('what_images');
    }

    /**
     * Get image URLs with conversions.
     */
    public function getWhatImagesAttribute()
    {
        $media = $this->getMedia('what_images')->last();
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
    