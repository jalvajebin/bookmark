<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    protected $appends = [
        'main_images',
        'inner_images'
    ];

    

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center', 70, 50)
            ->performOnCollections('main_images', 'inner_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);
        $this->addMediaConversion('preview')
            ->crop('crop-center', 380, 250)
            ->performOnCollections('main_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);

        $this->addMediaConversion('preview')
            ->crop('crop-center', 1920, 1280)
            ->performOnCollections('inner_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);

        $this->addMediaConversion('popular')
            ->crop('crop-center', 90, 90)
            ->performOnCollections('inner_images')
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function multipleTag($blogId, $tagId)
    {
        return $this->hasMany(BlogMultipleTag::class, 'blog_id', 'id')->where([['blog_id', $blogId], ['tag_id', $tagId]])->first();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_multiple_tags', 'blog_id', 'tag_id');
    }

    public function multipleCategory($blogId, $categoryId)
    {
        return $this->hasMany(BlogMultipleCategory::class, 'blog_id', 'id')->where([['blog_id', $blogId], ['category_id', $categoryId]])->first();
    }

    public function categoryMultiple()
    {
        //   dd($blog_id);
        return $this->hasMany(BlogMultipleCategory::class, 'blog_id', 'id');
    }
    public function tagMultiple()
    {
        //   dd($blog_id);
        return $this->hasMany(BlogMultipleTag::class, 'blog_id', 'id');
    }
}
