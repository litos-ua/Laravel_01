<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;
    protected $table = 'vacations';
    //protected $primaryKey = 'id_vac';
    protected $primaryKey = 'id_cat';
    protected $fillable = [
        'category',
        'slag',
        'filename',
        ];

    public function pictures()
    {
        return $this->hasMany(Picture::class, 'category', 'id_cat');
    }

}
