@extends('admin.layout.maindashboard')
@section('titledash', 'book')

@section('contain')

<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Buku</h1>

</div>

@if(session()->has('success'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
     {{ session('success') }}
    </div>
  </div>
@endif

<div class="table-responsive col-lg-11">
    <a class="btn btn-success mb-3" href="/admin/book/create">Tambah Buku</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Slug</th>
          <th scope="col">kategori</th>
          <th scope="col">Pembuat</th>
          <th scope="col">Sampul</th>
          <th scope="col">Kutipan</th>
          <th scope="col">deskripsi</th>
          <th scope="col">Ebook</th>
          <th scope="col">Stok</th>
          <th class="text-center" scope="col">aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
        <tr>
          <td></td>
          <td>{{ $book->name_book }}</td>
          <td>{{ $book->slug }}</td>
          <td>{{ $book->category->name }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->cover }}</td>
          <td>{{ $book->excerpt }}</td>
          <td>{{ $book->description_book }}</td>
          <td>{{ $book->book_pdf }}</td>
          <td>{{ $book->stok }}</td>

          <td>
            <div class="d-flex ">
                <a class="btn btn-primary border-0 me-2" href="/dashboard//"><i class="fa fa-eye" style="font-size:24px"></i></a>
                <a class="btn btn-primary border-0 me-2" href="/dashboard///edit"><i class="fa fa-edit" style="font-size:24px"></i></a>
                <form action="/dashboard/categories/" method="POST">
                    @method('delete')
                    @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('are you sure?')" type="submit" ><i class="fa fa-trash-o" style="font-size:24px"></i></button>
                </form>
            </div>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end">


    </div>
  </div>

@endsection
