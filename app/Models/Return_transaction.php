<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Return_transaction extends Model
{
    use HasFactory;
    protected $table = 'return_transaction';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function borrow_transaction()
    {
        return $this->hasOne(Borrow_transaction::class);
    }
}
