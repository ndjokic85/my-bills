<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;

class BillCategory extends Model
{
    protected $fillable = [
        'name',
        'due_day',
        'valid_from',
        'valid_to',
    ];
}
