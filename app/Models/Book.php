<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table='book'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        //id
        'title',
        'photo',
        'year',
        'status',
        'stock',
        'author',
        'isbn_issn',
        //type_id
        //publisher_id
        'description',
    ];
    
}
