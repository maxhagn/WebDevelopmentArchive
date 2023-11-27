<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['title', 'imageLink', 'copyright', 'description', 'date'];
}
