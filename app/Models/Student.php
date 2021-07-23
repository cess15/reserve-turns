<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'semester_id',
        'identification',
        'name',
        'slug',
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

    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = strtolower($value);
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

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
