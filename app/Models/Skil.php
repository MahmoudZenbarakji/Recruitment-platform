<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skil extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'skils';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function skillsJobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function skillsApplicatnts()
    {
        return $this->belongsToMany(Applicatnt::class);
    }
}
