<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminReturn_transaction extends Model
{
    use HasFactory;
    protected $table='admin_return_transaction'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
       'admin_id',
       'return_transaction',
    ];
}
