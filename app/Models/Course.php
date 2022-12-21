<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title','description'];

    public function vote(User $user)
    {
        Vote::create([
            'course_id' => $this->id,
            'user_id'   => $user->id
        ]);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class,'users_vote_course');
    }
}
