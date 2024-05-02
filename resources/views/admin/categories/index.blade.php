@extends('admin.admindashboard')

@section('titledash', 'Halaman kategori')
@section('contain')


<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Kategori buku</h1>

</div>

@if(session()->has('success'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
     {{ session('success') }}
    </div>
  </div>
@endif

<div class="table-responsive col-lg-6">
    <a class="btn btn-success mb-3" href="/admin/categories/create">Tambah kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <div class="d-flex ">
                <a class="btn btn-primary border-0 me-2" href="/admin/categories/{{ $category->slug }}/edit"><i class="fa fa-edit" style="font-size:24px"></i></a>
                <form action="/admin/categories/{{ $category->slug }}" method="POST">
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
