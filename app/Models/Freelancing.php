<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancing extends Model
{
    protected $table = 'freelancing';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'location',
        'price',
        'paymentMethod',
        'duration',
        'course',
    ];
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
