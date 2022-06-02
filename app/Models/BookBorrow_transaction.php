<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrow_transaction extends Model
{
    use HasFactory;
    protected $table='book_borrow_transaction'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        'book_id',
        'borrow_transaction_id',
        'number_book_borrow',
    ];

    public function book(){
        return $this->belongsToMany(Book::class,'book_borrow_transaction','borrow_transaction_id','book_id')->withPivot('number_book_borrow');
    }
    
}
