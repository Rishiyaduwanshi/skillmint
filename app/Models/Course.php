<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{ 
    protected $fillable = [
    'title',
    'description',
    'price',
    'duration',
    'level',
    'topics',
    'instructor',
    'schedule',
    'requirements',
    'image',
    'is_featured',
    'is_active'
];

public function certificates()
{
    return $this->hasMany(Certificate::class);
}
    //
}
