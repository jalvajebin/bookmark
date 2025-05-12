<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Counter extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'counter_1_name',
        'count1',
        'counter_1_alt',
        'counter_2_name',
        'count2',
        'counter_2_alt',
        'counter_3_name',
        'count3',
        'counter_3_alt',
        'counter_4_name',
        'count4',
        'counter_4_alt',
        'counter_5_name',
        'count5',
        'counter_6_name',
        'count6',
        'counter_7_name',
        'count7',
        'counter_8_name',
        'count8',
    ];
    protected $guarded = [];
    protected $appends = ['count1Image', 'count2Image', 'count3Image', 'count4Image'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            // ->crop('crop-center', 70, 50)
            ->performOnCollections('count1Image', 'count2Image', 'count3Image', 'count4Image')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(5);
        $this->addMediaConversion('preview')
            // ->crop('crop-center', 1500, 733)
            ->performOnCollections('count1Image', 'count2Image', 'count3Image', 'count4Image')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(7);
    }

    public function getCount1ImageAttribute()
    {
        $file = $this->getMedia('count1Image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }

    public function getCount2ImageAttribute()
    {
        $file = $this->getMedia('count2Image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }

    public function getCount3ImageAttribute()
    {
        $file = $this->getMedia('count3Image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }

    public function getCount4Imagettribute()
    {
        $file = $this->getMedia('count4Image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }
}
