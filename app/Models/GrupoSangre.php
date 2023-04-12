<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSangre extends Model
{
    use HasFactory;
    protected $table = 'gruposangre';
    protected $fillable = ['nombre'];
}
