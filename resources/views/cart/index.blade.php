@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["carts"] as $cart)
  <div class="col-md-12 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$cart->product->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $cart->getId()]) }}"
          class="btn bg-primary text-white">{{ $cart->product->getName() }}</a>
          <form action="{{ route('cart.index') }}" method="POST">
          @csrf
          <input type="hidden" name="productID" value="{{ $cart->getId() }}">
          <input type="number" name="quantity" value="{{ $cart->getQuantity() }}" min="1">
          <button type="submit" class="btn bg-primary text-white">Change</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
