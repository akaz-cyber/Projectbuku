<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_book' => 'required|unique:books|max:255',
            'author' => 'required|max:255',
            'slug' => 'required|unique:books',
            'category_id' => 'required',
            'excerpt' => 'required|max:255',
            'cover' =>'image|file|max:1024',
            'book_pdf' => 'file|mimes:pdf,doc,docx|max:102400',
            'description_book' => 'required',
            'stok' =>'required'
        ]);

        if($request->file('cover')){
            $validated['cover'] = $request->file('cover')->store('cover-images');
        }

        if($request->file('book_pdf')){
            $validated['book_pdf'] = $request->file('book_pdf')->store('book-pdfs');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->description_book), 200,);
        Book::create($validated);

        return redirect('/admin/book')->with('success', 'Kategori baru berhasil di tambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', [
            'books'=> $book,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'author' => 'required|max:255',
            'category_id' => 'required',
            'excerpt' => 'required|max:255',
            'cover' =>'image|file|max:1024',
            'book_pdf' => 'file|mimes:pdf,doc,docx|max:102400',
            'description_book' => 'required',
            'stok' =>'required'
        ];


        // dd($book->name_book);

        if ($request->name_book != $book->name_book) {
            $rules['name_book'] = 'required|unique:books';
         }

        if ($request->slug != $book->slug) {
            $rules['slug'] = 'required|unique:books';
        }
        $validated = $request->validate($rules);
         if($request->file('cover')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['cover'] = $request->file('cover')->store('cover-images');
        }
        if($request->file('book_pdf')){
            if($request->oldPdf){
                Storage::delete($request->oldPdf);
            }
            $validated['book_pdf'] = $request->file('book_pdf')->store('book-pdfs');
        }
         $validated['excerpt'] = Str::limit(strip_tags($request->description_book), 200,);



         Book::where('id', $book->id)
               ->update($validated);

    return redirect('/admin/book')->with('success', 'buku berhasil di perbarui!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        if($book->cover){
            Storage::delete($book->cover);
        }

        if($book->book_pdf){
            Storage::delete($book->book_pdf);
        }
        return redirect('/admin/book')->with('success', 'Kategori berhasil di hapus!!');
    }
    public function checkslug(Request $request){

        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);

    }
}
