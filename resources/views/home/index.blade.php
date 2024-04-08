@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('/storage/grand_opening3.png') }}" class="d-block w-100" alt="grand opening">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/storage/grilled_chicken_sandwich.jpeg') }}" class="d-block w-100" alt="grilled chicken sandwich">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/storage/crispy chicken sandwich.png') }}" class="d-block w-100" alt="crispy chicken sandwich">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/storage/double cheese burger.png') }}" class="d-block w-100" alt="double cheese burger">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/storage/french fries.jpeg') }}" class="d-block w-100" alt="french fries">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection
