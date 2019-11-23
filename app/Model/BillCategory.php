<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillCategory extends Model
{
    protected $fillable = [
        'name',
        'due_day'
    ];
}
