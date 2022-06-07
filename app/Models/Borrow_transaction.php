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
        'date_borrow',
        'date_returndata',
        'status',
    ];

    public function return_transaction(){
        return $this->belongsTo(Return_transaction::class);
    }

    public function student(){
        return $this->belongsToMany(Student::class);
    }
    
    public function admin(){
        return $this->belongsToMany(Admin::class,'admin_borrow_transaction','borrow_transaction_id','admin_id')->withPivot('timestamps');
    }
}
