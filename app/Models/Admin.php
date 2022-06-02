<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table='admin'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        //id
        'name',
        'username',
        'password',
    ];

    public function borrow_transaction(){
        return $this->belongsToMany(Borrow_transaction::class,'admin_borrow_transaction','borrow_transaction_id','admin_id')->withPivot('timestamps');
    }

    
}
