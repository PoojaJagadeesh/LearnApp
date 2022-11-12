<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermSubject extends Model
{
    use HasFactory;
    protected $table = 'term_subject';

    protected $fillable = [
        'term_id',
        'student_id',
        'subject_id',
        'mark',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function term()
    {
        return $this->belongsTo(Term::class,'term_id','id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
