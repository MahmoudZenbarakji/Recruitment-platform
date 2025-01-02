<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'applications';

    protected $dates = [
        'start_review',
        'closed_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending'   => 'Pending',
        'in_review' => 'In Review',
        'rejected'  => 'Rejected',
        'accpeted'  => 'Accepted',
    ];

    protected $fillable = [
        'job_id',
        'applicant_id',
        'status',
        'start_review',
        'closed_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function applicant()
    {
        return $this->belongsTo(Applicatnt::class, 'applicant_id');
    }

    public function getStartReviewAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartReviewAttribute($value)
    {
        $this->attributes['start_review'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getClosedDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setClosedDateAttribute($value)
    {
        $this->attributes['closed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
