<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_name', 'email', 'gender', 'enrollment_date',
        'description', 'department_id',
    ];

    protected $casts = [
        'enrollment_date' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'student_id';
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /** Years since enrollment, e.g. 3.9 */
    public function getYearsEnrolledAttribute(): float
    {
        return round($this->enrollment_date->floatDiffInYears(now()), 1);
    }

    /** Search by name (also matches email), filter by department & gender. */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['search'] ?? null, function ($q, $s) {
                $q->where(function ($q) use ($s) {
                    $q->where('student_name', 'like', "%{$s}%")
                      ->orWhere('email', 'like', "%{$s}%");
                });
            })
            ->when($filters['department_id'] ?? null, fn ($q, $d) => $q->where('department_id', $d))
            ->when($filters['gender'] ?? null, fn ($q, $g) => $q->where('gender', $g));
    }
}
