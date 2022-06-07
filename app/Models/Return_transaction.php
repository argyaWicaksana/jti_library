<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Return_transaction extends Model
{
    use HasFactory;
    protected $table='return_transaction'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
        //id
       'fine',
       'date_returnday',
    ];

    public function borrow_transaction(){
        return $this->hasOne(Borrow_transaction::class);
    }

    public function student(){
        return $this->belongsToMany(Student::class);
    }
    

    

}
