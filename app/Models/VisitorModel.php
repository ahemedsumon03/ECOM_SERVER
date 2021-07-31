<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
    public $table ='visitor';
    public $primaryKey = 'id';
    public $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
}