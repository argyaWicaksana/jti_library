<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'photo',
        'year',
        'status',
        'stock',
        'author',
        'isbn_issn',
        'type_id',
        'publisher_id',
        'description',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['order_by'] ?? false,
            function ($query, $orderBy) {
                if ($orderBy == 'popular') {
                    $totalBorrowedBooks = DB::table('book_borrow_transaction')
                        ->select('book_id', DB::raw('SUM(number_book_borrow) total_borrowed'))
                        ->groupBy('book_id');

                    $query->selectRaw('book.*')
                        ->leftJoinSub($totalBorrowedBooks, 'bb', function (JoinClause $join) {
                            $join->on('book.id', '=', 'bb.book_id');
                        })->orderByRaw('bb.total_borrowed DESC');
                } else if ($orderBy == 'new') {
                    $query->orderBy('created_at', 'asc');
                }
            }
        );
    }
}
