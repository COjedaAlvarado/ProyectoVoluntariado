<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estcivil extends Model
{
    use HasFactory;
    protected $table = 'estcivil';
    protected $fillable = ['nombre'];
}
