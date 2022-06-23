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
        //id
        'amount',
        // 'date_borrow',
        // 'date_returndata',
        // 'status',
    ];

    public function return_transaction(){
        return $this->belongsTo(Return_transaction::class);
    }
    
    public function book(){
        return $this->belongsToMany(Book::class,'book_borrow_transaction','borrow_transaction_id','book_id')->withPivot('number_book_borrow');
    }

    public function user(){
        return $this->hasMany(User::class,'borrow_transaction_user','borrow_transaction_id','user_id');
    }
}
