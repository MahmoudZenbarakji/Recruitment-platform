<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Applicatnt extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'applicatnts';

    protected $appends = [
        'image',
    ];

    public const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    protected $dates = [
        'birthday',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const EDUCATION_LEVEL_SELECT = [
        'associate' => 'Associate',
        'bachelor'  => 'Bachelor\'s',
        'master'    => 'Master\'s',
        'doctoral'  => 'Doctoral',
    ];

    protected $fillable = [
        'user_id',
        'full_name',
        'education_level',
        'experience_year',
        'salary_id',
        'nationality_id',
        'gender',
        'other_phone_number',
        'birthday',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function applicantReviews()
    {
        return $this->hasMany(Review::class, 'applicant_id', 'id');
    }

    public function applicantApplications()
    {
        return $this->hasMany(Application::class, 'applicant_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function getBirthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function cvs()
    {
        return $this->belongsToMany(Cv::class);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function skills()
    {
        return $this->belongsToMany(Skil::class);
    }
}
