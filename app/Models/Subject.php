<?php

namespace App\Models;

use App\Models\Departments;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'department_id'];

    public function department()
    {
        return $this->hasOne(Departments::class, 'id', 'department_id');
    }
    public function medias()
    {
        return $this->hasMany(Media::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
