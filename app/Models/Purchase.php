<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = ['customer_id', 'purchase_date', 'total_price'];
    public $timestamps = false;
}
