<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');  // Use `student_id` as the foreign key
    }

    

    protected $fillable = [
        'student_id',
        'subjects',
       
    ];
}
