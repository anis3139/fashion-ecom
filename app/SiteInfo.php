<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = ['mobile_one', 'mobile_two', 'address', 'mail_one', 'mail_two', 'mail_three',];
}
