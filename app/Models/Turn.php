<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Turn extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'days',
        'hour',
        'created_at',
        'updated_at'
    ];

    public function setDaysAttribute($value): void
    {
        $this->attributes['days'] = strtolower($value);
    }

    public function getDaysAttribute(): string
    {
        return ucfirst($this->attributes['days']);
    }

    public static function getDaysOrdered()
    {
        $turns = Turn::select(DB::raw('count (*) as total, days'))->groupBy('days')->orderBy('days','asc')->where('status', 1)->get();
        $array = $turns->toArray();

        $arrayOrdered = [
            [
                'total' => $array[1]['total'],
                'days' => $array[1]['days'],
            ],
            [
                'total' => $array[2]['total'],
                'days' => $array[2]['days'],
            ],
            [
                'total' => $array[3]['total'],
                'days' => $array[3]['days'],
            ],
            [
                'total' => $array[0]['total'],
                'days' => $array[0]['days'],
            ],
            [
                'total' => $array[4]['total'],
                'days' => $array[4]['days'],
            ],
        ];
        return collect($arrayOrdered);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
