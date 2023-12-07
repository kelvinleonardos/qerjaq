<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'position',
        'category',
        'type',
        'address',
        'city',
        'country',
        'description',
        'requirements',
        'salary',
        'job_pict',
        'applicants_quota',
        'applicants_count',
        'isActive',
        'company_id',
    ];

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
            return $this->belongsTo(User::class);
    }


}
