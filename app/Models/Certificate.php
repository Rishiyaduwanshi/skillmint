<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';

    protected $fillable = [
        'student_id',
        'course_id',
        'issued_date',
        'percentage',
        'status',
        'generated_by',
        'validity',
        'certificate_link',
    ];

    // Relation with the User model for student
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relation with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relation with the User model for who generated the certificate
    public function generatedBy()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
