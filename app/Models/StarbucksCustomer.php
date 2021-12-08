<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarbucksCustomer extends Model
{
    use HasFactory;
    protected $table = 'starbucks_customers';
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'phone',
        'TCNo',
    ];
}
