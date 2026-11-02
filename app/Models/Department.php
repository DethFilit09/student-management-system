<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $primaryKey = 'department_id';

    protected $fillable = ['dept_name', 'manager_name', 'location'];

    public function getRouteKeyName(): string
    {
        return 'department_id';
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'department_id', 'department_id');
    }
}
