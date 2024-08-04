<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'class_name',
        'capacity',
        'is_fulled',
        'price',
        'time_From',
        'time_to',
        'image',
    ];
}
