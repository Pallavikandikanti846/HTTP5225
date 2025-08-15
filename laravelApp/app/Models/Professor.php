<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    /** @use HasFactory<\Database\Factories\ProfessorFactory> */
    use HasFactory;

     protected $dates=['deleted_at'];

    protected $fillable = [
       'name',
    ];
    public function courses()
{
    return $this->hasOne(Course::class);
}

}
