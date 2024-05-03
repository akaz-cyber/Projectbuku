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

<div class="table-responsive col-lg-12">
    <a class="btn btn-success mb-3" href="/admin/book/create">Tambah Buku</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
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
          <td>{{ $loop->iteration }}</td>
          <td>{{ $book->name_book }}</td>
          <td>{{ $book->slug }}</td>
          <td>{{ $book->category->name }}</td>
          <td>{{ $book->author }}</td>
          <td><img class="img-fluid mb-md-4 mt-2" src="{{ asset('storage/' . $book->cover) }}" class="card-img-top"></td>
          <td>{{ $book->excerpt }}</td>
          <td>{{ $book->description_book }}</td>
          <td>
            @if ($book->book_pdf)
            <a href="{{ asset('storage/' . $book->book_pdf) }}" target="_blank" class="btn btn-primary"><i class="fa fa-eye" style="font-size:24px"></i></a>

                @else
                <p>Ebook tidak ada</p>

                @endif

        </td>

          <td>{{ $book->stok }}</td>

          <td>
            <div class="d-flex ">
                <a class="btn btn-primary border-0 me-2" href="/admin/book/{{ $book->slug }}/edit"><i class="fa fa-edit" style="font-size:24px"></i></a>
                <form action="/admin/book/{{ $book->slug }}" method="POST">
                    @method('delete')
                    @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Yakin ingin di hapus?')" type="submit" ><i class="fa fa-trash-o" style="font-size:24px"></i></button>
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
