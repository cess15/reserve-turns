<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'lastname',
        'mothers_lastname',
        'created_at',
        'updated_at'
    ];

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute(): string
    {
        return ucwords($this->attributes['name']);
    }

    public function setLastNameAttribute($value): void
    {
        $this->attributes['lastname'] = strtolower($value);
    }

    public function getLastNameAttribute(): string
    {
        return ucwords($this->attributes['lastname']);
    }

    public function setMothersLastNameAttribute($value): void
    {
        $this->attributes['mothers_lastname'] = strtolower($value);
    }

    public function getMothersLastNameAttribute(): string
    {
        return ucwords($this->attributes['mothers_lastname']);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
