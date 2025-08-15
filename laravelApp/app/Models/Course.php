<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $dates=['deleted_at'];

    protected $fillable = [
       'name',
       'description',
    ];
     // Many-to-Many with Student
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    // One-to-Many belongs to Professor
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
