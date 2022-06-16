<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
}
