<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow_transactionUser extends Model
{
    use HasFactory;
    protected $table='borrow_transaction_user'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        'user_id',
        'borrow_transaction_id',
    ];


}
