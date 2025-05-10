<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LearnAboutUs extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'heading',
        'button_title',
        'button_link',
        'employee_description',
        'employee_content_1',
        'employee_content_2',
        'employee_content_3',
        'employer_description',
        'employer_content_1',
        'employer_content_2',
        'employer_content_3',
        'employee_alt',
        'employer_alt',
    ];
    protected $guarded = [];
    protected $appends = ['employee_image_name', 'employer_image_name'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            // ->crop('crop-center', 70, 50)
            ->performOnCollections('employee_image_name', 'employer_image_name')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(5);
        $this->addMediaConversion('preview')
            // ->crop('crop-center', 1500, 733)
            ->performOnCollections('employee_image_name', 'employer_image_name')
            ->nonQueued()
            ->optimize()
            ->format('webp')
            ->quality(100)
            ->sharpen(7);
    }

    public function getEmployeeImageNameAttribute()
    {
        $file = $this->getMedia('employee_image_name')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEmployerImageNameAttribute()
    {
        $file = $this->getMedia('employer_image_name')
            ->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }
}
