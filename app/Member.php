<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    protected $guarded = ['id', 'created_at'];
}
