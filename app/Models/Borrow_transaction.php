<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow_transaction extends Model
{
    use HasFactory;
    protected $table='borrow_transaction'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        'amount',
        'date_borrow',
        'date_returndata',
        'status_id',
    ];

    public function return_transaction(){
        return $this->belongsTo(Return_transaction::class);
    }
    
    public function books(){
        return $this->belongsToMany(Book::class)->withPivot('number_book_borrow', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function bookborrow_transaction(){
        return $this->hasMany(BookBorrow_transaction::class);
    }
}
