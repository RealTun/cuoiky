<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::orderBy('updated_at', 'desc')->paginate(7);
        return view("books.index", compact("books"))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genres = DB::table('books')->distinct()->pluck('genre');
        return view('books.add', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'genre' => 'required',
            'isbn' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $image = time() . '_' . $name_file;
            $file->move(public_path('image/book/'), $image);
        }

        Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "PublicationYear" => $request->year,
            "genre" => $request->genre,
            "isbn" => $request->isbn,
            "coverImageUrl" => $image,
        ]);

        return redirect()->route('books.index')->with('success', 'Add new book successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $genres = DB::table('books')->distinct()->pluck('genre');
        return view('books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'genre' => 'required',
            'isbn' => 'required|numeric',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $image = time() . '_' . $name_file;
            $file->move(public_path('image/book/'), $image);
        }

        $book->update([
            "title" => $request->title,
            "author" => $request->author,
            "PublicationYear" => $request->year,
            "genre" => $request->genre,
            "isbn" => $request->isbn,
            "coverImageUrl" => isset($image) ? $image : $book->coverImageUrl,
        ]);

        return redirect()->route('books.index')->with('success', 'Update book successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('books.index')->with('success','Delete book successfully');
    }
}
