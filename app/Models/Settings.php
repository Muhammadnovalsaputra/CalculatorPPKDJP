<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //Select * from settings
    //insert into settings (phone_number,address)

    protected $fillable = [
        'app_name',
        'phone_number',
        'address'
    ];
}
