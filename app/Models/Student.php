<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='student'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        //id
       'name',
       'nim',
       'profile_picture',
       'ktm_picture',
       "username",
       "password",
    ];

    public function borrow_transaction(){
        return $this->hasOne(Borrow_transaction::class);
    }
    
    public function return_transaction(){
        return $this->hasOne(Return_transaction::class);
    }
    
}
