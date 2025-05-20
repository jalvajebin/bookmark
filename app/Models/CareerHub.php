<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CareerHub extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $appends = [
        'main_images',
        'inner_images',
        'inner1_images'
    ];


    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            // ->crop('crop-center', 70, 50)
            ->performOnCollections('main_images', 'inner_images', 'inner1_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);
        $this->addMediaConversion('preview')
            // ->crop('crop-center', 380, 250)
            ->performOnCollections('main_images','inner1_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);

        $this->addMediaConversion('preview')
            // ->crop('crop-center', 1920, 1280)
            ->performOnCollections('inner_images', 'inner1_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);

        $this->addMediaConversion('popular')
            // ->crop('crop-center', 90, 90)
            ->performOnCollections('inner_images', 'inner1_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);
    }

    public function getMainImagesAttribute()
    {
        $file = $this->getMedia('main_images')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }

    public function getInnerImagesAttribute()
    {
        $file = $this->getMedia('inner_images')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->popular   = $file->getUrl('popular');
        }
        return $file;
    }

    public function getInner1ImagesAttribute()
    {
        $file = $this->getMedia('inner1_images')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->popular   = $file->getUrl('popular');
        }
        return $file;
    }
}
