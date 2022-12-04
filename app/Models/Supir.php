<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supir extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "supir";
    protected $dates = ['deleted_at'];
}
