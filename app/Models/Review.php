<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'accept'   => 'Accept',
        'rejected' => 'Rejected',
        'holding'  => 'Holding',
    ];

    protected $fillable = [
        'company_id',
        'applicant_id',
        'rate',
        'comment',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function applicant()
    {
        return $this->belongsTo(Applicatnt::class, 'applicant_id');
    }
}
