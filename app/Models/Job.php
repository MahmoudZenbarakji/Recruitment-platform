<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'jobs';

    public const STATUS_SELECT = [
        'active' => 'Active',
        'closed' => 'Closed',
    ];

    protected $dates = [
        'closed_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const EXPERIENCES_YEAR_SELECT = [
        '0' => 'Fresh',
        '1' => '1 to 3 Years',
        '2' => '4 to 6 Years',
        '3' => '6 to 10 Years',
        '4' => 'More than 10 Years',
    ];

    protected $fillable = [
        'title',
        'type_id',
        'salary_id',
        'description',
        'experiences_year',
        'company_id',
        'status',
        'closed_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function jobApplications()
    {
        return $this->hasMany(Application::class, 'job_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(JobType::class, 'type_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getClosedDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setClosedDateAttribute($value)
    {
        $this->attributes['closed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function skills()
    {
        return $this->belongsToMany(Skil::class);
    }
}
