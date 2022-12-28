<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = ['car_title', 'car_image', 'car_link', 'car_status'];
    protected $table = "carousel";
}
