<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
       protected $fillable = ['title', 'description', 'image_name'];
}
