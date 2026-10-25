<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'package_title',
        'sub_package',
        'name',
        'email',
        'phone',
        'travel_date',
        'qty',
        'unit_price',
        'total',
    ];

    protected function casts(): array
    {
        return [
            'travel_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
