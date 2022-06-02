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
    
    public function publisher(){
        return $this->belongsToMany(Publisher::class);
    }

    public function type(){
        return $this->belongsToMany(Type::class);
    }

    public function borrow_transaction(){
        return $this->belongsToMany(Borrow_transaction::class,'book_borrow_transaction','borrow_transaction_id','book_id')->withPivot('number_book_borrow');
    }

}
