@extends('pantial.main')
@section('title','beranda')

@section('main')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/1200x400/?nature" class="d-block w-100" alt="...">
            <div class="card-img-overlay d-flex align-items-center"
            style="background-color: rgba(0, 0, 0, 0.7)">
            <h5 class="card-title text-center flex-fill p-4 "></h5>
        </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x400/?city" class="d-block w-100" alt="...">
            <div class="card-img-overlay d-flex align-items-center"
            style="background-color: rgba(0, 0, 0, 0.7)">
            <h5 class="card-title text-center flex-fill p-4 "></h5>
        </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x400/?travel" class="d-block w-100" alt="...">
            <div class="card-img-overlay d-flex align-items-center"
            style="background-color: rgba(0, 0, 0, 0.7)">
            <h5 class="card-title text-center flex-fill p-4 "></h5>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container mt-3">
    <h1 class="mb-md-3">Buku Terbaru</h1>
    <div class="col-lg-12">
        <div class="d-flex">
            <div class="card me-2" style="width: 18rem;">
                <img src="https://source.unsplash.com/1000x1000/?book" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Nama buku</h5>
                  <p class="text-center mt-2">Nama kategori</p>
                </div>
              </div>
              <div class="card me-2" style="width: 18rem;">
                <img src="https://source.unsplash.com/1000x1000/?book" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Nama buku</h5>
                  <p class="text-center mt-2">Nama kategori</p>
                </div>
              </div>
              <div class="card me-2" style="width: 18rem;">
                <img src="https://source.unsplash.com/1000x1000/?book" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Nama buku</h5>
                  <p class="text-center mt-2">Nama kategori</p>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/1000x1000/?book" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Nama buku</h5>
                  <p class="text-center mt-2">Nama kategori</p>
                </div>
              </div>



        </div>

    </div>
  </div>


        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div> --}}

@endsection
