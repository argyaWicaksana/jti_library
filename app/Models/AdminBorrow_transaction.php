<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBorrow_transaction extends Model
{
    use HasFactory;
    protected $table='admin_borrow_transaction'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
       'admin_id',
       'borrow_transaction_id',
    ];
}
