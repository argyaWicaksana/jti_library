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
        'date_borrow',
        'date_returndata',
        'status',
    ];

    public function return_transaction(){
        return $this->belongsTo(Return_transaction::class);
    }
    
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
