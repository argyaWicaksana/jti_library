<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrow_transaction extends Model
{
    use HasFactory;
    protected $table = 'book_borrow_transaction';
    protected $primaryKey = 'id';

    protected $fillable = [
        'book_id',
        'borrow_transaction_id',
        'number_book_borrow',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrow_transaction()
    {
        return $this->belongsTo(Borrow_transaction::class, 'borrow_transaction_id');
    }
}
