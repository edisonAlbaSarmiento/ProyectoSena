<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class pdf extends Model
{
    //
    protected $table = 'pdfs';
    protected $fillable = ['nombrerequisito', 'urlview', 'urldownload'];
    protected $guarded = ['id'];
}
