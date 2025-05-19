<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Job extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    protected $guarded = [];


    protected $appends = [
        'main_images',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            // ->crop('crop-center', 70, 50)
            ->performOnCollections('main_images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(6);
        $this->addMediaConversion('preview')
            // ->crop('crop-center', 380, 250)
            ->performOnCollections('main_images')
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


    public function locations(){

        return $this->hasMany(JobLocation::class);
    }

   public function categories(){

        return $this->hasMany(JobCategory::class);
    }


   public function sluggable(): array
   {
       return [
           'slug' => [
               'source' => 'title'
           ]
       ];
   }

    public function locationModel()
    {
        return $this->belongsTo(JobLocation::class, 'location');
    }

    public function categoryModel()
    {
        return $this->belongsTo(JobCategory::class, 'category');
    }

    public function schoolTypeModel()
    {
        return $this->belongsTo(JobSchoolType::class, 'school_type');
    }

    public function specialismModel()
    {
        return $this->belongsTo(JobSpecialism::class, 'specialism');
    }

    public function positionTypeModel()
    {
        return $this->belongsTo(JobPositionType::class, 'position_type');
    }

}
