<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'insc';
    protected $primaryKey = 'insc_hash';
    public $timestamps = false;
}
