<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalCoffeeCustomer extends Model
{
    use HasFactory;
    protected $table = 'portal_coffee_customers';
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'phone',
    ];
}
