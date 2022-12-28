<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable = ['com_number', 'com_mail', 'com_history', 'com_values'];


}
