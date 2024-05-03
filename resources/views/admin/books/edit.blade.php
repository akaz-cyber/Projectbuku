@extends('admin.layout.maindashboard')

@section('titledash','Tambah buku')
@section('contain')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Buku</h1>
</div>
<div class="col-lg-8">

    <form method="POST" action="/admin/book/{{ $books->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-5">
            <label for="name_book" class="form-label @error('name_book')
          is-invalid
          @enderror">Buku</label>
            <input type="text" class="form-control" id="name_book" name="name_book" required autofocus value="{{ old('name_book',$books->name_book) }}">
            @error('name_book')
            <div class="invalid-feedback text-start">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category )
                @if(old('category_id',$books->category_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="author" class="form-label @error('author')
          is-invalid
          @enderror">Pembuat</label>
            <input type="text" class="form-control" id="author" name="author" required autofocus value="{{ old('author',$books->author) }}">
            @error('author')
            <div class="invalid-feedback text-start">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="">Sampul buku*</label>
          <input type="hidden" name="oldImage" value="{{ $books->cover}}">
            @if($books->cover)
            <img src="{{ asset('storage/' . $books->cover) }}" class="img-preview img-fluid mb-3 col-sm-5">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input type="file" class="form-control" id="cover" name="cover"autofocus value="{{ old('cover') }}">
        </div>
        <div class="mb-5">
            <label for="excerpt" class="form-label @error('excerpt')
          is-invalid
          @enderror">Kutipan</label>
            <input type="text" class="form-control" id="excerpt" name="excerpt" required autofocus value="{{ old('excerpt',$books->excerpt) }}">
            @error('excerpt')
            <div class="invalid-feedback text-start">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="description_book" class="form-label @error('description_book')
          is-invalid
          @enderror">Deskripsi Buku* </label>
            <input type="hidden" class="form-control" id="description_book" name="description_book" required autofocus value="{{ old('description_book',$books->description_book) }}">
            <trix-editor style="height: 300px" input="description_book"></trix-editor>
            @error('description_book')
            <div class="invalid-feedback text-start">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label>Ebook</label>
            <input type="hidden" name="oldPdf" value="{{ $books->book_pdf }}">
            @if ($books->book_pdf)
            <a href="{{ asset('storage/' . $books->book_pdf) }}" target="_blank" class="btn btn-warning mt-3">Lihat buku</a>

            @else
            <p>Ebook belum di tambahkan</p>

            @endif
            <input type="file" class="form-control" id="book_pdf" name="book_pdf" autofocus value="{{ old('book_pdf',$books->book_pdf) }}">


        </div>
        <div class="mb-5">
            <label for="stok" class="form-label @error('stok')
          is-invalid
          @enderror">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required autofocus value="{{ old('stok',$books->stok) }}">
            @error('name')
            <div class="invalid-feedback text-start">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" id="slug" name="slug" required value="{{ old('slug',$books->slug) }}">
        </div>
        <button type="submit" class="btn btn-primary">perbarui buku</button>
    </form>
</div>


<script>
  const name = document.querySelector('#name_book');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function(){
    fetch('/dashboard/book/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })


function previewImage(){
    const cover = document.querySelector('#cover');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(cover.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }

}

</script>


@endsection
