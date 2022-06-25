<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table='status'; 
    protected $primaryKey = 'id'; 
  
    protected $fillable = [
       'name',
    ];

    public function borrow_transaction(){
        return $this->hasMany(Borrow_transaction::class);
    }
}
