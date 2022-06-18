<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use App\Models\Publisher;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use PDF;

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
        $publisher = Publisher::all();//get data from class table
        return view('admin.book.create', compact('type','publisher'));
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
            'type_id' => ['required'],
            'publisher_id' => ['required'],
            'description' => ['required', 'string'],
        ];
        
        $data = $request->validate($rules);        
        
        if($request->file('photo')){
            $data['photo'] = $request->file('photo')->store('images/photo');
        }
        
        // $book = new Book;
        // $type = new Type;
        // $type->id = $request->get('type');

        // $book->class()->associate($type);

        Book::create($data);

        // return redirect()->route('student.index')
        //     ->with('success', 'Student succesfully added');

        // $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'photo' => ['image'],
        //     'year' => ['required', 'date'],
        //     'status' => ['required', 'string', 'max:100'],
        //     'stock' => ['required'],
        //     'author' => ['required', 'string', 'max:255'],
        //     'isbn_issn' => ['required', 'string', 'max:20'],
        //     'type_id' => ['required'],
        //     'publisher_id' => ['required'],
        //     'description' => ['required', 'string'],
        // ]);
        // if ($request->file('photo')) {
        //     $photo_name = $request->file('photo')->store('photo', 'images/photo');
        // }

        // $book = new Book;
        // $book->title = $request->title;
        // $book->photo = $photo_name;
        // $book->year = $request->year;
        // $book->status = $request->status;
        // $book->stock = $request->stock;
        // $book->author = $request->author;
        // $book->isbn_issn = $request->isbn_issn;
        // $book->type_id = $request->type_id;
        // $book->publisher_id = $request->publisher_id;
        // $book->description = $request->description;
        // $book->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
