<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable=['title','meta_description','meta_keywords','logo','favicon','address','email','phone','fax','footer','facebook_url',
                        'twitter_url','linkedin_url','pinterest_url'];
}
