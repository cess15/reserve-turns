<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute(): string
    {
        return ucfirst($this->attributes['name']);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
