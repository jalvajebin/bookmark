<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Destination extends Model
{
    use HasFactory  ,InteractsWithMedia;
  
    // protected $fillable = ['title','title_two','discription','discription_two','read_more', 'read_more_two','link','link_two'];
     protected $guarded = [];
    protected $appends = ['images'];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            // ->crop('crop-center', 70, 50)
            ->performOnCollections('images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(5);
        $this->addMediaConversion('preview')
            // ->crop('crop-center', 1500, 733)
            ->performOnCollections('images')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(7);
    }

    // public function getImagesAttribute()
    // {
    //     $file = $this->getMedia('images')->last();
    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //         $file->preview   = $file->getUrl('preview');
    //     }
    //     return $file;
    // }

    public function getImagesAttribute()
{
    return $this->getMedia('images')->map(function ($file) {
        return [
            'url' => $file->getUrl(),
            'thumbnail' => $file->getUrl('thumb'),
            'preview' => $file->getUrl('preview'),
        ];
    });
}

}
