<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'tbl_messages';
    public $timestamps = false;
    protected $fillable = ['Email', 'Name', 'Message'];
}
