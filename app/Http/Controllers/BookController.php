<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use App\Models\Publisher;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::paginate(3);
        // $posts = book::orderBy('id','asc')->paginate(3);
        return view('admin.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        $publisher = Publisher::all();
        return view('admin.book.create', compact('type', 'publisher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'photo' => ['image'],
            'year' => ['required', 'date'],
            'status' => ['required', 'string', 'max:100'],
            'stock' => ['required'],
            'author' => ['required', 'string', 'max:255'],
            'isbn_issn' => ['required', 'string', 'max:20'],
            'type_id' => ['nullable'],
            'publisher_id' => ['nullable'],
            'description' => ['required', 'string'],
        ];

        $data = $request->validate($rules);

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('images/book');
        }

        Book::create($data);

        return redirect()->route('book.index')
            ->with('success', 'book succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Book = Book::where('id', $id)->first();

        return view('admin.book.detail', ['Book' => $Book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Book = Book::where('id', $id)->first();
        $type = Type::all();
        $publisher = Publisher::all(); //get data from class table
        // $catalog = Catalog::all();
        return view('admin.book.edit', compact('type', 'publisher', 'Book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'photo' => ['image'],
            'year' => ['required', 'date'],
            'status' => ['required', 'string', 'max:100'],
            'stock' => ['required'],
            'author' => ['required', 'string', 'max:255'],
            'isbn_issn' => ['required', 'string', 'max:20'],
            'type_id' => ['required'],
            'publisher_id' => ['required'],
            'description' => ['required', 'string'],
        ];

        $data = $request->validate($rules);

        if ($request->file('photo')) {
            if ($request->oldProfile) {
                Storage::delete($request->oldProfile);
            }
            $data['photo'] = $request->file('photo')->store('images/photo');
        }

        Book::where('id', $book->id)
            ->update($data);

        return redirect()->route('book.index')
            ->with('success', 'Book Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book->photo && file_exists(storage_path('app/public/' . $book->photo))) {
            Storage::delete($book->photo);
        }
        $book->bookborrow_transaction()->delete();

        $book->delete();
        return redirect()->route('book.index')
            ->with('success', 'Book Successfully Deleted');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $book = Book::where('title', 'like', "%" . $keyword . "%")
            ->orWhere('status', 'like', "%" . $keyword . "%")
            ->orWhere('stock', 'like', "%" . $keyword . "%")
            ->orWhere('isbn_issn', 'like', "%" . $keyword . "%")
            ->orWhere('author', 'like', "%" . $keyword . "%")
            ->paginate(3);
        return view('admin.book.search', compact('book'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    public function print_books()
    {
        $books = Book::all();
        $pdf = Pdf::loadview('print.books_pdf', ['books' => $books]);
        return $pdf->stream('books.pdf');
    }
}
