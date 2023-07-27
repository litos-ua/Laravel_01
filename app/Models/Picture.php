<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $table = 'pictures';
    protected $primaryKey = 'id_pic';
    protected $fillable = [
        'id_pic',
        'filename',
        'title',
        'description',
        'category',
        'fototype',
    ];

    protected $casts = [
        'fototype' => 'integer', // Specify 'fototype' as an integer
    ];

}
